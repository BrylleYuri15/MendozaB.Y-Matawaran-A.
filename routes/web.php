<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class, 'index'])->name('students.index');


Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');


Route::post('/students', [StudentController::class, 'store'])->name('students.store');


Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');


Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');


Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
