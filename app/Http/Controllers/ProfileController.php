<?php

namespace App\Http\Controllers;

use App\Services\categoryService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\articles;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $categoryService = new categoryService();
            $categories = $categoryService->getCategories();
            $userarticles = articles::with('users')->where('user_id', "$userid")->orderBy('articles.id', 'DESC')->paginate(5);
            $popularArticles = articles::with('users')->orderBy('articles.id', 'desc')->limit(5)->get();
            return view('profile', ['userarticles' => $userarticles, 'categories' => $categories, 'popularPosts' => $popularArticles]);
        }
    }
}