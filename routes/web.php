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
   Route::get('/listbook', 'listing')->name('listbook');
   Route::delete('/listbook/{book}','delete');
   Route::get('/newbook', 'newbook');
   Route::post('/newbook', 'store');//新規本入力
});


Route::controller(ReportController::class)->middleware(['auth'])->group(function(){
   Route::get('/listbo/{newreport}', 'newreport');
   Route::post('/listbook/{newreport}', 'store');//「この本のレポートを作成する」
   Route::get('/listboo/{accompany}', 'accompany');//「この本のレポートを見る」&テキスト編集
   Route::put('/listbook/edit/{accompany}', 'update');
   Route::get('/listreport', 'listing')->name('listreport');//レポートリスト
   Route::get('/listreport/{report}edit', 'edition');//レポートリスト→特定のレポート編集
   Route::put('/listreport/{report}', 'updation');
   Route::delete('/listreport/{report}','delete');
});//レポート登録画面

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
   Route::get('/categories/{category}','index');
   Route::get('/list/category{category}', 'category'); 
   Route::post('/listbook/category{category}', 'store');
   //Route::delete('/posts/{post}','delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
