<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function create(request $request)
    {
        try {
            $title = $request->contactTitle;
            $body = $request->contactBody;
            $mail = $request->contactEmail;
            $fullName = $request->contactName;
            if (!empty($body)) {
                $contactCreate = contacts::firstOrCreate(
                    [
                        'fullName' => "$fullName",
                        'email' => "$mail",
                        'title' => "$title",
                        'body' => "$body",
                        'isRead' => 0
                    ]
                );
                $result = "success";
            } else {
                $result = "fail";
            }
            return view('/contact', ['result' => "$result"]);
        } catch (Throwable $e) {
            return $e;
        }
    }
}