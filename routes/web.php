<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;


Route::get('/world', function () {
    return 'World';
});

Route::get('/welcome', function () {
    return 'Selamat Datang';
});


Route::get('/user/{name?}', function ($name = null) {
    return 'Nama Saya '. $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId){
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
    });


// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// });

// Route::get('/user/{name?}', function ($name= 'John') {
//     return 'Nama saya '.$name;
// });

Route::get('/hello', [WelcomeController::class,'hello']);


Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class);

use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class)->only([
 'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
 'create', 'store', 'update', 'destroy'
]);

// Route::get('/greeting', function () {
// return view('blog.hello', ['name' => 'Abeng']);
// });
Route::get('/greeting', [WelcomeController::class, 'greeting']);
