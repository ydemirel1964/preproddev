<?php

namespace App\Http\Controllers;

use App\Services\articleService;
use App\Services\categoryService;
use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class searchController extends Controller
{
  public function search(Request $request)
  {
    $searchTerm = $request->searchTerm;
    $categoryService = new categoryService();
    $articleService = new articleService();
    $sidebarCategories = $categoryService->getSidebarCategories();
    $sidebarArticles = $articleService->getSidebarArticles();

    $searchResult = articles::where(function ($query) use ($searchTerm) {
      $query
        ->where('content_title', 'LIKE', '%' . $searchTerm . '%')
        ->orWhere('content_description', 'LIKE', '%' . $searchTerm . '%');
    })->paginate(3);

    return view('searchresult', ['searchTerm' => "$searchTerm", 'searchResult' => $searchResult, 'sidebarCategories' => $sidebarCategories, 'sidebarArticles' => $sidebarArticles]);
  }
}