<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Services\newsletter;
use Illuminate\Support\Facades\File;
use \MailchimpMarketing\ApiClient;
use \Illuminate\Validation\ValidationException;

Route::post('newsletter', NewsletterController::class);

Route::get('ping',function(){
    
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    $response = $mailchimp->lists->getAllLists();
});

Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('post/{post:slug}', 'show');

    Route::get('/admin/posts/create', 'create')->middleware('AdminOnly');
    Route::post('/admin/posts', 'store')->middleware('AdminOnly');
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
