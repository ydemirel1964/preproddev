<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\articleService;
use App\Services\categoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categoryService = new categoryService();
        $articleService = new articleService();
        $sidebarCategories = $categoryService->getSidebarCategories();
        $sidebarArticles = $articleService->getSidebarArticles();
        $articles = $articleService->getAllArticles($request);
        return view('home', ['articles' => $articles, 'sidebarCategories' => $sidebarCategories, 'sidebarArticles' => $sidebarArticles]);
    }
}