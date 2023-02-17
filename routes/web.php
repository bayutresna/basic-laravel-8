<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;

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
Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('post/{post:slug}', 'show');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'create')->middleware('guest');
    Route::post('/register', 'store')->middleware('guest');
    
    Route::get('/login','login')->middleware('guest'); 
    Route::post('/login','logging')->middleware('guest'); 

    Route::post('/logout','logout')->middleware('auth'); 

});

Route::controller(CommentController::class)->group(function(){
    Route::post('/posts/{post:slug}/comments', 'store')->middleware('auth');
});
