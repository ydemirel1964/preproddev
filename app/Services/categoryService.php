<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class categoryService {

public function getCategories()
{
    $result = DB::table('categories')
    ->join('article_categories', 'categories.id', '=', 'article_categories.category_id')
    ->select('categories.category as category','categories.slug as slug','categories.parent_id as parent_id','id','article_categories.category_id as categoryid','categories.updated_at as updated_at')
    ->where('categories.parent_id',"0")
    ->groupBy('categoryid')
    ->get();
    $result = $this->categorySubCategories($result);
    return $result;
}

public function getSidebarCategories()
{
    $result = DB::table('categories')
    ->join('article_categories', 'categories.id', '=', 'article_categories.category_id')
    ->select('categories.category as category','categories.slug as slug','categories.updated_at as updated_at','id','article_categories.category_id as categoryid',DB::raw('COUNT(article_categories.category_id) as category_count'))
    ->orderBy('category_count',"DESC")
    ->groupBy('categoryid')
    ->get();
    return $result;
}
public function categorySubCategories($categories)
{
    foreach ($categories as $key => $category) {
        $subCategory = DB::table('categories')
        ->where('parent_id',"$category->id")
        ->get();
    
        if(count($subCategory)>0){
            $category->subCategories = $subCategory;
        }
    }
    return $categories;
}

}