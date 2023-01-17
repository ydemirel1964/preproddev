<?php

namespace App\Http\Controllers;

use App\Services\categoryService;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\articles;
use App\Models\categories;
use Illuminate\Support\Facades\Log;

class WriterProfileController extends Controller
{
    public function index($writer_id)
    {
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        
        $userarticles = articles::with('users')->where('user_id', "$writer_id")->orderBy('articles.id','DESC')->simplePaginate(10);
        $popularArticles = articles::with('users')->orderBy('articles.id', 'desc')->limit(5)->get();

        return view('writerprofile', ['userarticles'=>$userarticles,'categories'=>$categories ,'popularPosts'=>$popularArticles,]);
    }
}
