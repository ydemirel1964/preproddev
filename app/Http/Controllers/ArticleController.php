<?php

namespace App\Http\Controllers;

use App\Services\articleService;
use App\Services\categoryService;
use App\Models\articles;
use App\Models\comments;
use App\Models\categories;
use App\Models\article_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ArticleController extends Controller
{
    public function index($slug)
    {
        $categoryService = new categoryService();
        $articleService = new articleService();
        $articles = $articleService->getArticle($slug);
        $sidebarArticles = $articleService->getSidebarArticles();
        $sidebarCategories = $categoryService->getSidebarCategories();
        return view('article', ['sidebarCategories' => $sidebarCategories, 'sidebarArticles' => $sidebarArticles, 'articles' => $articles]);
    }

    public function createForm(request $request)
    {
        if (Auth::check()) {
            try {
                $categories = categories::get();
                return view('articleCreate', ['categories' => $categories]);
            } catch (Throwable $e) {
                return $e;
            }
        }
    }

    public function create(request $request)
    {
        if (Auth::check()) {
            try {
                $validator = Validator::make($request->all(), [
                    'articlecontenttitle' => 'required|min:30|max:255',
                    'articlecontentdescription' => 'max:500',
                    'articlecontent' => 'required|max:10000|min:300',
                    'categories' => 'required|array|min:1'
                ]);

                if ($validator->fails()) {
                    return redirect('/profile/create-article')
                        ->withErrors($validator)
                        ->withInput();
                }


                $contenttitle = $request->articlecontenttitle;
                $contentdescription = $request->articlecontentdescription;
                $content = $request->articlecontent;
                $userid = Auth::user()->id;
                $slug = $userid . "-" . time();
                $contentcategory = $request->categories;
                $articlecreate = articles::firstOrCreate(
                    [
                        'content_title' => "$contenttitle",
                        'content_description' => "$contentdescription",
                        'content' => "$content",
                        'slug' => "$slug",
                        'user_id' => $userid
                    ]
                );
                foreach ($contentcategory as $category) {
                    article_categories::firstOrCreate(
                        [
                            'article_id' => $articlecreate->id,
                            'category_id' => $category
                        ]
                    );
                }
                return redirect('/profile');
            } catch (Throwable $e) {
                return $e;
            }
        }
    }

    public function delete($id)
    {
        // FIXME: Bu alan ileriki aşamada kullanıcıların yazılarını silmesi için kullanılıcaktır.
        $articles = articles::where('id', $id)->get();
        if (count($articles) > 0) {
            $articlecommentsdelete = comments::where('article_id', $id)->delete();
            $articlecategorydelete = article_categories::where('article_id', $id)->delete();
            $articledelete = articles::where('id', $id)->delete();
        }
        return redirect('/profile');
    }

    public function update($articleid, request $request)
    {

        // FIXME: Bu alan kullanıcıların yazılarını güncellemsi içib kullanılıcaktır.

        if ($request->has('_token')) {
            $id = Auth::user()->id;
            $articlecontenttitle = $request->articlecontenttitle;
            $articlecontentdescription = $request->articlecontentdescription;
            $content = $request->articlecontent;
            $dom = new \DomDocument();
            $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = "/upload/" . time() . $item . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
                $image->setAttribute('alt', $articlecontenttitle);
            }
            $articlecontent = $dom->saveHTML();
            $contentcategory = $request->categories;
            $articlesupdate = articles::where([['user_id', "$id"], ['id', "$articleid"]])->update(array('content_title' => "$articlecontenttitle", 'content' => "$articlecontent", 'content_description' => "$articlecontentdescription"));
            foreach ($contentcategory as $category) {
                $categorycreate = article_categories::firstOrCreate(
                    [
                        'article_id' => $articleid,
                        'category_id' => $category
                    ]
                );
            }
            return redirect('/profile');
        } else {
            $selectedCategoriesId = array();
            $id = Auth::user()->id;
            $articles = articles::where([['user_id', "$id"], ['id', "$articleid"]])->limit(1)->get();
            $selectedCategories = article_categories::where('article_id', $articleid)->get();
            foreach ($selectedCategories as $value) {
                $selectedCategoriesId[] = $value['category_id'];
            }
            $categories = categories::get();
            return view('admin/articleupdate', ['articles' => $articles, 'categories' => $categories, 'selectedCategoriesId' => $selectedCategoriesId]);
        }
    }
}