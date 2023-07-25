<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class categoryService
{

    public function getCategories()
    {
        if (Cache::has('getCategories') !== true) {
            $result = DB::table('categories')
                ->join('article_categories', 'categories.id', '=', 'article_categories.category_id')
                ->select('categories.category as category', 'categories.slug as slug', 'categories.parent_id as parent_id', 'id', 'article_categories.category_id as categoryid', 'categories.updated_at as updated_at')
                ->where('categories.parent_id', "0")
                ->where('categories.admin_confirmation', "1")
                ->groupBy('categoryid')
                ->get();
            $result = $this->categorySubCategories($result);
            Cache::add('getCategories', $result);
        } else {
            $result = Cache::get('getCategories');
        }
        return $result;
    }

    public function getSidebarCategories()
    {
        if (Cache::has('getSidebarCategories') !== true) {
            $result = DB::table('categories')
                ->join('article_categories', 'categories.id', '=', 'article_categories.category_id')
                ->join('articles', 'articles.id', "=", "article_categories.article_id")
                ->select('categories.category as category', 'categories.slug as slug', 'categories.updated_at as updated_at', 'categories.id', 'article_categories.category_id as categoryid', DB::raw('COUNT(article_categories.category_id) as category_count'))
                ->where('categories.admin_confirmation', "1")
                ->where('articles.admin_confirmation', "1")
                ->orderBy('category_count', "DESC")
                ->groupBy('categoryid')
                ->get();
            Cache::add('getSidebarCategories', $result);
        } else {
            $result = Cache::get('getSidebarCategories');
        }
        return $result;
    }
    public function categorySubCategories($categories)
    {
        foreach ($categories as $key => $category) {
            $subCategory = DB::table('categories')
                ->where('parent_id', "$category->id")
                ->get();

            if (count($subCategory) > 0) {
                $category->subCategories = $subCategory;
            }
        }
        return $categories;
    }

}