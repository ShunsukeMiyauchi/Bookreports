<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(BookController::class)->middleware(['auth'])->group(function(){
   Route::get('/schedule', 'schedule')->name('schedule');
   Route::get('/newbook', 'newbook')->name('newbook');
   Route::post('/newbook', 'store');//新規本入力
});//本登録画面

Route::controller(ReportController::class)->middleware(['auth'])->group(function(){
   Route::get('/newreport', 'newreport'); 
   Route::post('/newreport', 'store');//新規レポート入力
   Route::get('/search', 'search')->name('search');
   Route::get('/edit', 'edit');
});//レポート登録画面

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
   Route::get('/categories', 'category')->name('category'); 
   Route::post('/categories', 'store');//新規カテゴリー入力
});//カテゴリー画面


/*下記のように、同じcontroller内に複数の関数指示を書くことができる。
  Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
　あとはcontroller内でそれぞれの関数毎のviewへ返してやればいい
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
