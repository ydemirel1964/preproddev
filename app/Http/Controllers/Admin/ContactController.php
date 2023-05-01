<?php

namespace App\Http\Controllers\Admin;

use App\Models\contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $contacts = contacts::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin/contact', ['contacts'=>$contacts]);
    }
   
   
    public function delete($id){
        $categories=contacts::where('id',$id)->delete();
        $contacts = contacts::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin/contact', ['contacts'=>$contacts]);
    }
   
}
