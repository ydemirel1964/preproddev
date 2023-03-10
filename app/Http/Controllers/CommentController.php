<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\categoryService;

use Illuminate\Support\Facades\Auth;
use App\Models\comments;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::check()) {
            $articlecomment = $request->articlecomment;
            $articleid = $request->articleid;
            $articleslug = $request->slug;
            $userid = Auth::user()->id;
            $commentcreate = comments::firstOrCreate(
                [
                    'comment' => "$articlecomment",
                    'article_id' => "$articleid",
                    'user_id' => $userid
                ]
            );

            return redirect("/article/$articleslug");
        }
    }

    public function delete(Request $request)
    {
        info($request);
       // if (Auth::check()) {
        //}
        //return redirect('/article/' . $id);
    }
}
