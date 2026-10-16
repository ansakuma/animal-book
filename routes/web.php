<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animals.show');

require __DIR__.'/auth.php';
