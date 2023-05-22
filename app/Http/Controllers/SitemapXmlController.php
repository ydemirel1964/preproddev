<?php

namespace App\Http\Controllers;

use App\Services\categoryService;

use App\Models\categories;
use App\Models\articles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SitemapXmlController extends Controller
{
    public function index() {
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        
        $categories = json_decode(json_encode($categories), true);
        $articles = articles::select('slug','updated_at')->get();
        return response()->view('sitemap', [
            'categories' => $categories,
            'articles' => $articles
        ])->header('Content-Type', 'text/xml');
      }

  
}
