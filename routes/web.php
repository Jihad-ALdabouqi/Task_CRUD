<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SalonController;
use App\Http\Controllers\SalonResourceController;
use App\Http\Controllers\ServiceController;


Route::get('/salons', [SalonController::class, 'index'])->name('salons.index');
Route::get('/salons/create', [SalonController::class, 'create'])->name('salons.create');
Route::post('/salons', [SalonController::class, 'store'])->name('salons.store');
Route::get('/salons/{id}/edit', [SalonController::class, 'edit'])->name('salons.edit');
Route::put('/salons/{id}', [SalonController::class, 'update'])->name('salons.update');
Route::delete('/salons/{id}', [SalonController::class, 'destroy'])->name('salons.destroy');

Route::resource('salons-resource', SalonResourceController::class);

Route::resource('services', ServiceController::class);

