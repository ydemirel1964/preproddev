<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;

class MessageController extends Controller
{
    public function checkUnseenMessage()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $unseenMessageCount = count(ChMessage::where('to_id', $userid)->where('seen', 0)->get());
            return $unseenMessageCount;
        }
        return false;

    }
}