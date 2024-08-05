<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [NewsController::class,'index'])->name('pages.index');



Route::get('/category', function () {
    return view('pages.category');
})->name('pages.category');

Route::get('/news/{news}',[NewsController::class,'show'])->name('pages.single');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');

Route::get('/auth',function (){
    return view('auth.auth');
})->name('login');

Route::post('login',[AuthController::class,'login'])->name('auth.login');
Route::post('auth/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('register',[AuthController::class,'register'])->name('register');

Route::get('/category/{category}',[CategoryController::class,'show'])->name('category.show');


Route::get('/search',[NewsController::class,'search'])->name('search');




Route::prefix('admin')->name('admin.')->middleware(['auth',IsAdmin::class])->group(function (){
    Route::get('news',[AdminController::class,'index'])->name('index');
    Route::get('news/create',[AdminController::class,'create'])->name('create');
    Route::get('news/edit/{news}',[AdminController::class,'edit'])->name('edit');
    Route::post("news/update/{news}",[AdminController::class,'update'])->name('update');
    Route::post("news/delete/{news}",[AdminController::class,'destroy'])->name('delete');
});

Route::get('/test',function(Request $request){
//     $news = \App\Models\News::featuredNews()->get();
//    foreach($news as $n){
//        echo "$n->title <br>";

//        echo $n->category->name. '<br>';
//    }

});
