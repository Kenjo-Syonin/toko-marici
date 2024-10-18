<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('/item')->name('item.')->group(function(){
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/store', [ItemController::class, 'store'])->name('store');
    Route::get('/', [ItemController::class, 'index'])->name('home');
    Route::get('/{id}', [ItemController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [ItemController::class, 'update'])->name('update');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('destroy');
});