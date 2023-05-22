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

    public function create(request $request)
    {
        // FIXME: Bu alan ileriki aşamada kullanıcıların yazı paylaşması için yapılacaktır
        if (Auth::check()) {
            try {
                $contenttitle = $request->articlecontenttitle;
                $content = $request->articlecontent;
                $contentdescription = $request->articlecontentdescription;
                $contentcategory = $request->categories;
                $userid = Auth::user()->id;
                $articlecreate = articles::firstOrCreate(
                    [
                        'content_title' => "$contenttitle",
                        'content_description' => "$contentdescription",
                        'content' => "$content",
                        'user_id' => $userid
                    ]
                );
                foreach ($contentcategory as $category) {
                    $categorycreate = article_categories::withTrashed()->firstOrCreate(
                        [
                            'article_id' => $articlecreate->id,
                            'category_id' => $category
                        ]
                    );
                }
                return redirect('/dashboard/articles');
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