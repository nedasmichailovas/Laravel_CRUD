<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Studentų sąrašas prieinamas visiems
Route::get('students', [StudentController::class, 'index'])
     ->name('students.index');

// Visi kiti maršrutai – tik prisijungusiems
Route::middleware('auth')->group(function () {

    Route::get('students/trashed',
        [StudentController::class, 'trashed'])
        ->name('students.trashed');

    Route::post('students/{id}/restore',
        [StudentController::class, 'restore'])
        ->name('students.restore');

    Route::delete('students/{id}/forceDelete',
        [StudentController::class, 'forceDelete'])
        ->name('students.forceDelete');

    Route::resource('students', StudentController::class)
         ->except(['index']);
});

require __DIR__.'/auth.php';