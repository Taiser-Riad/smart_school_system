<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //Show all teachers
    public function index(){
        return view('teachers', [        
            'heading' => 'The teachers',
            'teachers' => Teacher::all()
        ]);
    }
    //Show one teacher
    public function show(Teacher $teacher){
        return view('teacher', [
            'teacher'=> $teacher
            ]);
    }
    //Delete teacher
    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect('/')->with('message','Teacher deleted successfully');
    }
}
