<?php

use App\Http\Controllers\TrabajadorController;
use Illuminate\Support\Facades\Route;

Route::get('trabajadores',[TrabajadorController::class,'index'])->name('trabajadores.index');
Route::get('trabajadores/create',[TrabajadorController::class,'create'])->name('trabajadores.create');
Route::post('trabajadores/store',[TrabajadorController::class,'store'])->name('trabajadores.store');
Route::get('trabajadores/edit/{id}',[TrabajadorController::class,'edit'])->name('trabajadores.edit');
Route::put('trabajadores/update/{id}',[TrabajadorController::class,'update'])->name('trabajadores.update');
Route::delete('trabajadores/delete/{id}',[TrabajadorController::class,'destroy'])->name('trabajadores.delete');
Route::get('trabajadores/show/{id}',[TrabajadorController::class,'show'])->name('trabajadores.show');
Route::post('trabajadores/filtro',[TrabajadorController::class,'filtrar'])->name('trabajadores.filtrar');

