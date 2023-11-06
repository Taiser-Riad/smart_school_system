<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;
use App\Models\Student;
use App\Http\Controllers\StudentController;

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
    return view('first');
});//->middleware(['auth', 'verified'])->name('dashboard');



//All teachers
Route::get('/teachers', [TeacherController::class, 'index']);
//Delete teacher
Route::delete('/teachers/{teacher}', [TeacherController::class,'destroy']);
//Show add new teacher form
Route::get('/teachers/create', [TeacherController::class,'create']);
//Store teacher data
Route::post('/teachers', [TeacherController::class,'store']);
//Show edit teacher form
Route::get('/teachers/{teacher}/edit', [TeacherController::class,'edit']);
//Update teacher info
Route::put('/teachers/{teacher}', [TeacherController::class,'update']);
//single teacher
Route::get('/teachers/{teacher}', [TeacherController::class,'show']);



//All students
Route::get('/students', [StudentController::class, 'index']);
//Delete student
Route::delete('/students/{student}', [StudentController::class,'destroy']);
//Show add new student form
Route::get('/students/create', [StudentController::class,'create']);
//Store student data
Route::post('/students', [StudentController::class,'store']);
//Show edit student form
Route::get('/students/{student}/edit', [StudentController::class,'edit']);
//Update student info
Route::put('/students/{student}', [StudentController::class,'update']);
//single student
Route::get('/students/{student}', [StudentController::class,'show']);


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
