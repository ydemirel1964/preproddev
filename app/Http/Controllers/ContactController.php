<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\categoryService;

use App\Models\categories;
use App\Models\contacts;
use Throwable;
class ContactController extends Controller
{
    public function index(){
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        $popularCategories = $categoryService->getPopularCategories();
        return view('contact', ['categories'=>$categories,'popularCategories'=>$popularCategories]);
    }

    public function create(request $request){
                try {               
                    $title=$request->contactTitle;
                    $body=$request->contactBody;
                    $mail = $request->contactEmail;
                    $fullName = $request->contactName;
                    if(!empty($body)){  
                    $contactCreate=contacts::firstOrCreate(
                        [
                            'fullName'=>"$fullName",
                            'email'=>"$mail",
                            'title'=>"$title",
                            'body'=>"$body",
                            'isRead'=>0
                        ]
                    );
                    $result = "success";
                    }else
                    {
                        $result = "fail";
                    }
                    $categories = categories::get();
                    $categoryService = new categoryService();
                    $popularCategories = $categoryService->getPopularCategories();
                    return view('/contact', ['categories'=>$categories,'popularCategories'=>$popularCategories,'result'=>"$result"]);
                }catch (Throwable $e) {
                    return $e;
                }
    }
}
