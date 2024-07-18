<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/add',[App\Http\Controllers\UserController::class, 'add'])->name('add');
Route::post('/store',[App\Http\Controllers\UserController::class, 'store'])->name('store');
Route::get('/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/delete/{id}',[App\Http\Controllers\UserController::class, 'delete'])->name('delete');
