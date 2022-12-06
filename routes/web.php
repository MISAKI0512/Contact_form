<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

//ユーザー用//
Route::get('/', [FormController::class,'index'])->name('index');
Route::post('/confirm', [FormController::class, 'confirm'])->name('form.confirm');
Route::post('/store', [FormController::class, 'store'])->name('form.store');


//管理者用//
Route::get('/admin', [FormController::class, 'admin'])->name('admin');
Route::post('/delete/{id}', [FormController::class, 'delete'])->name('delete');
Route::get('/search', [FormController::class, 'search'])->name('search');