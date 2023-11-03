<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;

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
//All teachers
Route::get('/', [TeacherController::class, 'index']);
//Delete teacher
Route::delete('/teachers/{teacher}', [TeacherController::class,'destroy']);
//Show add new teacher form
Route::get('/teachers/create', [TeacherController::class,'create']);
//Store teacher data
Route::post('/teachers', [TeacherController::class,'store']);
//single teacher
Route::get('/teachers/{teacher}', [TeacherController::class,'show']);



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
