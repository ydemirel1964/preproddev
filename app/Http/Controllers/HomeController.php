<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Services\categoryService;

use App\Models\articles;
use App\Models\categories;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {           

        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        $popularCategories = $categoryService->getPopularCategories();
        
        $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->simplePaginate(10);
        $popularArticles = articles::with('users')->orderBy('articles.id', 'desc')->get();
        $tags = [];
        return view('home', ['articles'=>$articles , 'categories'=>$categories,'popularCategories'=>$popularCategories, 'popularPosts'=>$popularArticles,'tags'=> $tags]);
    }
}
