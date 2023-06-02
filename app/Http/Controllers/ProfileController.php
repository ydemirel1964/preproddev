<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $userArticles = articles::with('users')->where('user_id', "$userid")->orderBy('articles.id', 'DESC')->paginate(5);
            return view('profile', ['userArticles' => $userArticles]);
        }
    }
}