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
        $popularCategories = $categoryService->getPopularCategories();
        $articles = articles::with('users')->with('comments')->orderBy('id', 'desc')->paginate(5);
        $popularArticles = articles::with('users')->orderBy('articles.id', 'desc')->get();
        $tags = [];
        return view('home', ['articles'=>$articles , 'popularCategories'=>$popularCategories, 'allArticles'=>$popularArticles,'tags'=> $tags]);
    }
}
