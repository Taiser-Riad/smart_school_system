<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    //Show all teachers
    public function index(){
        return view('teachers.index', [        
            'heading' => 'The teachers',
            'teachers' => Teacher::all()
        ]);
    }
    //Show one teacher
    public function show(Teacher $teacher){
        return view('teachers.show', [
            'teacher'=> $teacher
            ]);
    }
    //show add new teacher form
    public function create(){
        return view('Teachers.create');
    }
    //Store teacher data
    public function store(Request $request){
        $formFields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => ['required', Rule::unique('teachers','email')],
            'password' =>['required','confirmed','min:6'],
            'phone' => 'required',
            'about'=> 'required',
            'salary'=> 'required',
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('teachers','public');
        }
        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $teacher = Teacher::create($formFields);
        return redirect('/');
    }

    //Delete teacher
    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect('/')->with('message','Teacher deleted successfully');
    }
}
