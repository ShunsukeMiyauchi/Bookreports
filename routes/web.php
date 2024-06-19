<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
    // 名前付きルートとは、ルーティングにname('name名')を付与することで、ルートの名前を指定することができます。
    // カリキュラム9-4

Route::get('/', function() {
    return view('Bookreport.Current_reading');
}); //現在読んでいる本リスト画面

Route::get('/', function() {
    return view('Bookreport.Register_book');
}); //本登録画面

Route::get('/', function() {
    return view('Bookreport.Register_report');
}); //レポート登録画面

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
