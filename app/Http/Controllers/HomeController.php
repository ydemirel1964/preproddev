<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\articleService;
use App\Services\categoryService;

class HomeController extends Controller
{
    public function index()
    {
        $categoryService = new categoryService();
        $articleService = new articleService();
        $sidebarCategories = $categoryService->getSidebarCategories();
        $sidebarArticles = $articleService->getSidebarArticles();
        $articles = $articleService->getAllArticles();
        return view('home', ['articles' => $articles, 'sidebarCategories' => $sidebarCategories, 'sidebarArticles' => $sidebarArticles]);
    }
}