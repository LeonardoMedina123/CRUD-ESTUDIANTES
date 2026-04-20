<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
Route::get('/read', [CrudController::class, 'read'])->name('crud.read');
Route::get('/update', [CrudController::class, 'update'])->name('crud.update');
Route::get('/delete', [CrudController::class, 'delete'])->name('crud.delete');

Route::resource('carreras', CarreraController::class);
Route::resource('estudiantes', EstudianteController::class);
