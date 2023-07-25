<?php

namespace App\Http\Controllers\Admin;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Throwable;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categories::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin/category', ['categories' => $categories]);
    }
    public function createForm()
    {
        $categories = categories::get();
        return view('admin/categoryCreate', ['categories' => $categories]);
    }
    public function create(request $request)
    {
        if (Auth::check()) {
            try {
                $category = $request->category;
                $slug = $request->categoryslug;
                $parentCategory = $request->parentCategory;
                $metatags = $request->metatags;
                $description = $request->description;
                $userId = Auth::user()->id;
                $categorycreate = categories::firstOrCreate(
                    [
                        'category' => $category,
                        'slug' => $slug,
                        'parent_id' => $parentCategory,
                        'metatags' => $metatags,
                        'description' => $description,
                        'user_id' => $userId,
                        'admin_confirmation' => 1
                    ]
                );
                cache::forget('getSidebarCategories');
                return redirect('/admin/categories');
            } catch (Throwable $e) {
                return $e;
            }
        }
    }
    public function delete($id)
    {
        $categories = categories::where('id', $id)->delete();
        cache::forget('getSidebarCategories');
        return redirect('/admin/categories');
    }
    public function update($categoryid, request $request)
    {
        if ($request->has('_token')) {
            $category = $request->category;
            $slug = $request->categoryslug;
            $metatags = $request->metatags;
            $description = $request->description;
            $parentCategory = $request->parentCategory;
            categories::where('id', "$categoryid")->update(array('category' => "$category", 'slug' => "$slug", 'parent_id' => $parentCategory, 'description' => $description, 'metatags' => $metatags, 'admin_confirmation' => 1));
            cache::forget('getSidebarCategories');
        } else {
            $categories = categories::get();
            $category = categories::where('id', $categoryid)->get();
            return view('admin/categoryUpdate', ['category' => $category, 'categories' => $categories]);
        }
        return redirect('/admin/categories');
    }
}