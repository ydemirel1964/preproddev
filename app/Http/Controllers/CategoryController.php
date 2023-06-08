<?php

namespace App\Http\Controllers;

use App\Services\articleService;
use App\Services\categoryService;
use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $categoryService = new categoryService();
        $articleService = new articleService();

        $sidebarCategories = $categoryService->getSidebarCategories();
        $sidebarArticles = $articleService->getSidebarArticles();
        $category = categories::select("category", 'id', 'description')->where("slug", "$slug")->get();

        $articleGroup = array();
        $categoryName = "";

        if (count($category) > 0) {
            $category_id = $category[0]->id;
            $article_categories = DB::table('categories')
                ->join('article_categories', 'article_categories.category_id', '=', 'categories.id')
                ->join('articles', 'articles.id', '=', 'article_categories.article_id')
                ->join('users', 'users.id', '=', 'articles.user_id')
                ->select('articles.user_id', 'articles.id', 'users.name', 'categories.category', 'articles.slug', 'articles.content_title', 'articles.content_description', 'articles.created_at', 'categories.metatags')
                ->where('categories.id', $category_id)
                ->orWhere('categories.parent_id', $category_id)
                ->orderBy('articles.rank', 'ASC')
                ->get();

            $article_categories = json_decode(json_encode($article_categories), true);
            //KATEGORI SAYFASINDA KATEGORİLERİ DÜZENLEMEK İÇİN YAZILARI KATEGORI ISMINE GORE GRUPLADIK
            $articleGroup = array();
            foreach ($article_categories as $value) {
                $articleGroup[$value['category']][] = $value;
            }
            $categoryName = $category[0]->category;
        }

        return view('category', ['article_categories' => $articleGroup, 'sidebarArticles' => $sidebarArticles, 'category_name' => $categoryName, 'sidebarCategories' => $sidebarCategories]);
    }

    public function createForm()
    {
        if (Auth::check()) {
            try {
                $categories = categories::
                    where('admin_confirmation',1)->orWhere('user_id',Auth::user()->id)->get();
                return view('categoryCreate', ['categories' => $categories]);
            } catch (Throwable $e) {
                return $e;
            }
        }
    }


    public function create(Request $request)
    {
        if (Auth::check()) {
            try {
                $validator = Validator::make($request->all(), [
                    'category' => 'required|min:1|max:255',
                    'description' => 'max:1000'
                ]);

                if ($validator->fails()) {
                    return redirect('/profile/create-category')
                        ->withErrors($validator)
                        ->withInput();
                }


                $category = $request->category;
                $description = $request->description;
                $parentCategory = $request->parentCategory;
                $userid = Auth::user()->id;
                $slug = $userid . "-" . time();
                categories::firstOrCreate(
                    [
                        'category' => $category,
                        'slug' => $slug,
                        'parent_id' => $parentCategory,
                        'description' => $description,
                        'user_id'=>$userid
                    ]
                );
                return redirect('/profile');
            } catch (Throwable $e) {
                return $e;
            }
        }
    }


}