<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\HeadmasterController;
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
//Show edit teacher password form
Route::get('/teachers/{teacher}/editpassword', [TeacherController::class,'editpassword']);
//Update teacher password
Route::put('/teachers/{teacher}', [TeacherController::class,'updatepassword']);
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
//Show edit teacher password form
Route::get('/students/{student}/editpassword', [StudentController::class,'editpassword']);
//Update teacher password
Route::put('/students/{student}', [StudentController::class,'updatepassword']);
//single student
Route::get('/students/{student}', [StudentController::class,'show']);


//All classrooms
Route::get('/classrooms', [ClassroomController::class, 'index']);
//All students of this classroom
Route::get('/classrooms/{classroom}/indexstudents', [ClassroomController::class, 'indexstudents']);
//All teachers of this classroom
Route::get('/classrooms/{classroom}/indexteachers', [ClassroomController::class, 'indexteachers']);
//Delete classroom
Route::delete('/classrooms/{classroom}', [ClassroomController::class,'destroy']);
//Show add new classroom form
Route::get('/classrooms/create', [ClassroomController::class,'create']);
//Store classroom data
Route::post('/classrooms', [ClassroomController::class,'store']);
//Show edit classroom form
Route::get('/classrooms/{classroom}/edit', [ClassroomController::class,'edit']);
//Update classroom info
Route::put('/classrooms/{classroom}', [ClassroomController::class,'update']);
//Show add new teacher to classroom form
Route::get('/classrooms/{classroom}/addteacher', [ClassroomController::class,'addTeacher']);
//Store teacher-classroom
Route::post('/classrooms/{classroom}', [ClassroomController::class,'storeTeacher']);
//single classroom
Route::get('/classrooms/{classroom}', [ClassroomController::class,'show']);





//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';


//for students
Route::middleware(['auth','role:student'])->group(function () {
//welcome student
Route::get('studentWelcome', [StudentController::class,'welcome']);
});


//for teachers
Route::middleware(['auth','role:teacher'])->group(function () {
//welcome teacher
Route::get('teacherWelcome', [TeacherController::class,'welcome']);
});


//for managers
Route::middleware(['auth','role:manager'])->group(function () {
//welcome manager
Route::get('managerWelcome', [ManagerController::class,'welcome']);
});


//for head-masters
Route::middleware(['auth','role:headmaster'])->group(function () {
//welcome head-master
Route::get('headmasterWelcome', [HeadmasterController::class,'welcome']);
});