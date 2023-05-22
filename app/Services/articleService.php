<?php
namespace App\Services;

use App\Models\articles;

class articleService
{
    public function getAllArticles()
    {
        $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->paginate(3);
        return $articles;
    }

    public function getSidebarArticles()
    {
        $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->limit(10)->get();
        return $articles;
    }

    public function getArticle($articleSlug)
    {
        $article = articles::with('users')->where('slug', "$articleSlug")->limit(1)->get();
        return $article;
    }
}