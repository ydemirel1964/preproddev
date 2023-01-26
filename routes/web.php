<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\ProfileController as UserProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WriterProfileController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\SitemapXmlController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::group(['middleware' => ['urlControl']], function() {
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/hakkimizda', [AboutMeController::class, 'index']);
Route::get('/aboutme', [AboutMeController::class, 'index']);

Route::get('/iletisim', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/create',[ContactController::class, 'create']);
Route::delete('/article/{id}', [ArticleController::class, 'delete']);
Route::get('/article/{slug}', [ArticleController::class, 'index']);

Route::get('/comment/create', [CommentController::class, 'create']);
Route::get('/comment/delete', [CommentController::class, 'delete']);
Route::get('/searchresult', [searchController::class, 'search']);

Route::get('/category/{slug}', [CategoryController::class, 'index']);
Route::get('/writerprofile/{id}', [WriterProfileController::class, 'index']);

Route::get('/profile', [UserProfileController::class, 'index'])->name('userProfile');

Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);

Route::post('/checkUnseenMessage', [MessageController::class, 'checkUnseenMessage']);

Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin/articlecreate', [AdminArticleController::class,'createForm'])->middleware('auth');
Route::post('/admin/article/create', [AdminArticleController::class, 'create'])->middleware('auth');
Route::get('/admin/article/updateform/{id}', [AdminArticleController::class, 'updateform'])->middleware('auth');
Route::post('/admin/article/update/{id}', [AdminArticleController::class, 'update'])->middleware('auth');
Route::get('/admin/article/delete/{id}', [AdminArticleController::class, 'delete'])->middleware('auth');

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/contact', [AdminContactController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard/categories',[AdminCategoryController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard/articles',[AdminArticleController::class, 'index'])->middleware(['auth']);
Route::get('/admin/categorycreate', [AdminCategoryController::class,'createForm'])->middleware('auth');
Route::post('/admin/category/create', [AdminCategoryController::class, 'create'])->middleware('auth');
Route::get('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->middleware('auth');
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->middleware('auth');
});

});


//Clear all cache
Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    return '<h1>Tüm cacheler silindi.</h1>';
});


