<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comments;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function create(Request $request): array
    {
        $articleSlug = $request->slug;
        if (Auth::check()) {
            $articlecomment = $request->articlecomment;
            $articleid = $request->articleid;

            $userid = Auth::user()->id;
            $createdComment = comments::firstOrCreate(
                [
                    'comment' => "$articlecomment",
                    'article_id' => "$articleid",
                    'user_id' => $userid
                ]
            );
            info($createdComment);
            Cache::forget("comments" . $articleSlug);
            return array('status' => 'success', 'data' => $createdComment, 'userName' => Auth::user()->name);
        } else {
            Cache::forget("comments" . $articleSlug);
            return ['status' => 'fail', 'data' => null];
        }
    }

    public function delete(Request $request): string
    {
        $articleSlug = $request->slug;
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $commentId = $request->commentId;
            comments::where(
                [
                    'id' => "$commentId",
                    'user_id' => $userid
                ]
            )->delete();
            Cache::forget("comments" . $articleSlug);
            return "success";
        } else {
            Cache::forget("comments" . $articleSlug);
            return "fail";
        }
    }
}