<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\articles;

class articleService
{
    public function getAllArticles($request)
    {
        $page = !isset($request['page']) ? 0 : $request['page'];
        if (Cache::has('getAllArticles' . $page) !== true) {
            $articles = articles::with('users')->with('comments')->where('admin_confirmation', 1)->orderBy('id', 'desc')->paginate(2);
            Cache::add('getAllArticles' . $page, $articles);
        } else {
            $articles = Cache::get('getAllArticles' . $page);
        }
        return $articles;
    }

    public function getSidebarArticles()
    {
        if (Cache::has('getSidebarArticles') !== true) {
            $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->where('admin_confirmation', 1)->limit(20)->get();
            Cache::add('getSidebarArticles', $articles);
        } else {
            $articles = Cache::get('getSidebarArticles');
        }
        return $articles;
    }

    public function getArticle($articleSlug)
    {
        if (Cache::has($articleSlug) !== true) {
            $article = articles::with('users')->where('slug', "$articleSlug")->limit(1)->get();
            Cache::add($articleSlug, $article);
        } else {
            $article = Cache::get($articleSlug);
        }

        return $article;
    }
}