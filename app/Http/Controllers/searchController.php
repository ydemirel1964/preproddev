<?php

namespace App\Http\Controllers;

use App\Services\categoryService;

use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;


class searchController extends Controller
{
    public function search(Request $request)
    {
       $searchTerm = $request->searchTerm;
       
       $categoryService = new categoryService();
       $categories = $categoryService->getCategories();
       
       $searchResult = articles::where(function ($query) use($searchTerm) {
         $query
           ->where('content_title', 'LIKE', '%' . $searchTerm . '%')
           ->orWhere('content', 'LIKE', '%' . $searchTerm . '%')
           ->orWhere('content_description', 'LIKE', '%' . $searchTerm . '%');
      })->simplePaginate(10);
      return view('searchresult', ['searchTerm'=>"$searchTerm",'searchresult'=>$searchResult,'categories'=>$categories]);
    }
}
