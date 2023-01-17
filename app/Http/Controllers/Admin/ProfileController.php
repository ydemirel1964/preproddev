<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\articles;
use App\Models\categories;
use App\Models\comments;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            $categoryCount=categories::count();
            $articleCount = articles::count();
            $commentCount = comments::count();
            $userCount = User::count();

            $articles = articles::with('users')->orderBy('id', 'DESC')->limit(5)->get();
            $comments = comments::with('users')->orderBy('id','DESC')->limit(5)->get();
            $users = User::orderBy('id','DESC')->limit(5)->get();

            return view('admin/profile', 
            [
            'articles'=>$articles,
            'comments'=>$comments,
            'users'=>$users,
            'categoryCount'=>$categoryCount,
            'articleCount'=>$articleCount,
            'commentCount'=>$commentCount,
            'userCount'=>$userCount
            ]);
    }
}
