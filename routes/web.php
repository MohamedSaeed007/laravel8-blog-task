<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\frontend\ArticleController as FarticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\frontend\CategoryController as FcategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\frontend\TagController as FtagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('home', [HomeController::class, 'userHome'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('auth.admin');

Route::get('/',[FarticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}',[FarticleController::class, 'show'])->name('articles.show');
Route::get('/categories/{category}',[FcategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag}',[FtagController::class, 'show'])->name('tags.show');

Route::middleware('auth')->group(function () {
    Route::get('/users/edit',[UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update',[UserController::class, 'update'])->name('users.update');
    Route::post('/comments',[CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments',[CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware(['auth.admin','auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('articles', ArticleController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('comments', AdminCommentController::class)->except('show');
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    
    Route::post('/users/{user}/make-admin',[UserController::class, 'makeAdmin'])->name('users.make-admin');
});