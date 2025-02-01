<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate; 

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Lang\LanguageController;

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


Route::get('/',[HomeController::class,'indexHome'])->name('Front.home');
Route::get('/about',[HomeController::class,'about'])->name('Front.about');
Route::get('/contact',[HomeController::class,'contact'])->name('Front.contact');
Route::post('/contact',[HomeController::class,'sendMessage'])->name('front.sendMessage');

Route::get('/search',[FrontPostController::class,'search'])->name('front.search');


Route::get('/lang/{local}',[LanguageController::class,'switchLanguage']);
/* Route::get('/lang/{locale}', function ($locale) {
    // Check if the requested locale is valid (e.g., 'en', 'fr', etc.)
    if (in_array($locale, ['en', 'fr'])) {
        // Store the locale in the session
        session()->put('locale', $locale);
    }
    // Redirect back to the previous page or home page
    return redirect()->back();
}); */

Route::group(['prefix'=>'posts'],function(){
    Route::get('/showAll',[PostController::class,'index'])->name('posts.showAll');

    Route::get('/showPost/{id}',[PostController::class,'showPost']);
    
    Route::get('/create',[PostController::class,'create']);/* ->middleware('can:user-only'); */
    Route::post('/add',[PostController::class,'store']);
    
    Route::get('/edit/{id}',[PostController::class,'editPost'])->middleware('can:user-only');
    Route::put('/update/{id}',[PostController::class,'updatePost']);
    
    Route::delete('/{id}',[PostController::class,'destroyPost']);    
});

Route::group(['prefix'=>'users'],function(){
    Route::get('/showUser',[UserController::class,'index']);

    Route::get('/createUser',[UserController::class,'create']);
    Route::post('/add',[UserController::class,'store']);

    Route::get('/edit/{id}',[userController::class,'editUser'])->middleware('can:user-only');
    Route::put('/update/{id}',[UserController::class,'updateUser']);
    
    Route::delete('/{id}',[userController::class,'destroyUser']); 

    Route::get('/posts/{id}',[userController::class,'postsUser']); //To show posts for user.
});

Route::group(['prefix'=>'tags'],function(){
    Route::get('/showTag',[TagController::class,'index']);

    Route::get('/createTag',[TagController::class,'create']);
    Route::post('/add',[TagController::class,'store']);

    Route::get('/edit/{id}',[TagController::class,'editTag']);
    Route::put('/update/{id}',[TagController::class,'updateTag']);
    
    Route::delete('/{id}',[TagController::class,'destroyTag']); 

    Route::get('/posts/{id}',[TagController::class,'postsUser']); //To show posts for user.
});

Route::group(['prefix'=>'ajaxtags'],function(){
    Route::get('/showTag',[AjaxController::class,'index']);

    Route::get('/createTag',[AjaxController::class,'create']);
    Route::post('/add',[AjaxController::class,'store']);

    Route::get('/edit/{id}',[AjaxController::class,'editTag']);
    Route::put('/update/{id}',[AjaxController::class,'updateTag']);
    
    Route::delete('/{id}',[AjaxController::class,'destroyTag']); 

    Route::get('/posts/{id}',[AjaxController::class,'postsUser']); //To show posts for user.
});


Route::group(['prefix'=>'setting'],function(){
    Route::get('/edit',[SettingController::class,'editSetting']);
    Route::put('/update',[SettingController::class,'updateSetting']);
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
