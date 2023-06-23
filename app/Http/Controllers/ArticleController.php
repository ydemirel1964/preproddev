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
                $categories = categories::where('admin_confirmation', 1)->orWhere('user_id', Auth::user()->id)->get();
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
                    'articlecontenttitle' => 'required|min:10|max:255',
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
        if (Auth::check()) {
            try {

                if ($request->has('_token')) {

                    $validator = Validator::make($request->all(), [
                        'articlecontenttitle' => 'required|min:10|max:255',
                        'articlecontentdescription' => 'max:500',
                        'articlecontent' => 'required|max:10000|min:300',
                        'categories' => 'required|array|min:1'
                    ]);

                    if ($validator->fails()) {
                        return redirect('/profile/update-article/' . $request->id)
                            ->withErrors($validator)
                            ->withInput();
                    }

                    $id = Auth::user()->id;
                    $articleUserId = articles::select('user_id')->where('id', $articleid)->first();
                    if ($id !== $articleUserId['user_id']) {
                        throw new \Exception("UserId Hatası", 1);
                    }
                    $articleid = $request->id;
                    $articlecontenttitle = $request->articlecontenttitle;
                    $articlecontentdescription = $request->articlecontentdescription;
                    $slug = $request->articleslug;
                    $metatags = $request->metatags;
                    $content = $request->articlecontent;
                    $contentcategory = $request->categories;
                    $articlesupdate = articles::where([['user_id', "$id"], ['id', "$articleid"]])->update([
                        'content_title' => "$articlecontenttitle",
                        'slug' => "$slug",
                        'metatags' => "$metatags",
                        'content' => "$content",
                        'content_description' => "$articlecontentdescription",
                        'admin_confirmation' => 1
                    ]);
                    article_categories::whereNotIn('category_id', $contentcategory)->where('article_id', $articleid)->delete();
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
                    $id = Auth::user()->id;
                    $articleUserId = articles::select('user_id')->where('id', $articleid)->first();
                    if ($id !== $articleUserId['user_id']) {
                      return redirect('/profile');
                    }
                    $selectedCategoriesId = array();


                    $articleid = $request->id;
                    $articles = articles::where([['user_id', "$id"], ['id', "$articleid"]])->limit(1)->get();
                    $selectedCategories = article_categories::where('article_id', $articleid)->get();
                    foreach ($selectedCategories as $value) {
                        $selectedCategoriesId[] = $value['category_id'];
                    }
                    $categories = categories::get();
                    return view('articleUpdate', ['article' => $articles, 'categories' => $categories, 'selectedCategoriesId' => $selectedCategoriesId]);
                }
            } catch (Throwable $e) {
                return $e;
            }

        } else {
            return redirect('login');
        }
    }
}