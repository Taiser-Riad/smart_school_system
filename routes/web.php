<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/', function () {
    return view('teachers', [        
        'heading' => 'The teachers',
        'teachers' => Teacher::all()
    ]);
});
//single teacher
Route::get('/teachers/{id}', function ($id) {
    return view('teacher', [
        'teacher'=> Teacher::find($id)
        ]);
});
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
