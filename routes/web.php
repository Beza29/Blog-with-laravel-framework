<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('news/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'view']);
Route::get('news/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);

Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store']);

Route::prefix('admin')->middleware (['auth', 'isAdmin'])->group (function() {
   Route::get ('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
   Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
   Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
   Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
   Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
   Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
   Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class,'store'])->name('add-category.store');
   Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
   Route::get('post', [App\Http\Controllers\Admin\PostController::class, 'index']);
   Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
   Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
   Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
   Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
   Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
   Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
   Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
   Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
   Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
   Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'savedata']);
});