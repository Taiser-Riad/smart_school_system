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
            'email' => ['required', Rule::unique('teachers','email'),'email'],
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
        Teacher::create($formFields);
        return redirect('/');
    }
    //Show edit form
    public function edit(Teacher $teacher){
        return view('Teachers.edit', ['teacher'=>$teacher]);
    }
//Update teacher info
    public function update(Request $request, Teacher $teacher){
            $formFields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'about'=> 'required',
            'salary'=> 'required',
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('teachers','public');
        }
        $formFields['password'] = $teacher->password;
        $teacher->update($formFields);
        return back();
    }


    //Delete teacher
    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect('/')->with('message','Teacher deleted successfully');
    }
}
