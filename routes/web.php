<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Show all students
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// Show the form to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Store a new student in the database
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Show a single student
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

// Show the form to edit an existing student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update an existing student
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// Delete a student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
