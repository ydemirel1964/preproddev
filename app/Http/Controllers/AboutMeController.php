<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\categoryService;

use App\Models\articles;
use App\Models\comments;
use App\Models\categories;

class AboutMeController extends Controller
{
    public function index(){
        info("deneme");
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        $populerCategories = $categoryService->getCategories();
        $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->simplePaginate(10);
        $popularArticles = articles::with('users')->orderBy('articles.id', 'desc')->limit(5)->get();
        $tags = [];
        $categoryService = new categoryService();
        $popularCategories = $categoryService->getPopularCategories();
        return view('aboutme', ['articles'=>$articles , 'categories'=>$categories, 'popularCategories' => $popularCategories,'popularPosts'=>$popularArticles,'tags'=> $tags]);
    }
}
