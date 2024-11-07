<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('students', [StudentController::class, 'index'])->name('student.index');

Route::get('students/create', [StudentController::class, 'createStudent'])->name('student.add');

Route::post('students/create', [StudentController::class, 'storeStudent'])->name('student.store');

Route::delete('students/delete/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

Route::get('students/edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');

Route::post('students/update/{id}', [StudentController::class, 'updateStudent'])->name('student.update');
