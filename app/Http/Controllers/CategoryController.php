<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\categoryService;

use App\Models\article_categories;
use App\Models\categories;
use App\Models\articles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories();
        $popularCategories = $categoryService->getPopularCategories();
        $articleGroup = array();       
        $categoryName =$categoryDescription= "";
        $category = categories::select("category",'id','description')->where("slug","$slug")->get();
        if(count($category)>0){
        $category_id= $category[0]->id;
    
        $article_categories = DB::table('categories')
        ->join('article_categories','article_categories.category_id','=','categories.id')
        ->join('articles','articles.id','=','article_categories.article_id')
        ->join('users','users.id','=','articles.user_id')
        ->select('articles.user_id','articles.id','users.name','categories.category','articles.slug','articles.content_title','articles.content_description','articles.created_at','categories.metatags')
        ->where('categories.id',$category_id)
        ->orWhere('categories.parent_id',$category_id)
        ->orderBy('articles.rank','ASC')
        ->get();

        $article_categories = json_decode(json_encode($article_categories), true);

        //KATEGORI SAYFASINDA KATEGORİLERİ DÜZENLEMEK İÇİN YAZILARI KATEGORI ISMINE GORE GRUPLADIK
        $articleGroup = array();       
        foreach ( $article_categories as $value ) {
        $articleGroup[$value['category']][] = $value;
        }
        $categoryName = $category[0]->category;
        $categoryDescription = $category[0]->description;
        }
        $allArticles = articles::with('users')->orderBy('articles.created_at', 'desc')->get();
        
        return view('category', ['article_categories'=>$articleGroup , 'allArticles'=>$allArticles,'category_name'=>$categoryName,'category_description'=>$categoryDescription,'categories'=>$categories, 'popularCategories'=>$popularCategories]);
    }

}
