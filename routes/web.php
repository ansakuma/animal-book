<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;

Route::get('/', [AnimalController::class, 'index'])->name('index');



Route::middleware('auth')->group(function () {

    // マイページ
    Route::get('/mypage', [AnimalController::class, 'mypage'])->name('animals.mypage');

    // 新規登録
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');

    // 編集
    Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::patch('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update');

    // 削除
    Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy');

    //いいね
    Route::post('/animals/{animal}/like', [LikeController::class, 'toggleLike'])->name('animals.like')->middleware('auth');
    // プロフィール設定（元からあるBreezeのコード）
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animals.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';
