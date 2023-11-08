<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
        //Show all students
        public function index(){
            return view('students.index', [        
                'heading' => 'The students',
                'students' => Student::all()
            ]);
        }
        //Show one student
        public function show(Student $student){
            return view('students.show', [
                'student'=> $student
                ]);
        }
        //show add new student form
        public function create(){
            return view('students.create');
        }
        //Store student data
    public function store(Request $request){
        $formFields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName'=> 'required',
            'motherFirstName'=> 'required',
            'motherLastName'=> 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => ['required', Rule::unique('students','email'),'email'],
            'dateOfBirth'=> 'required',
            'password' =>['required','confirmed','min:6'],
            'fatherPhone' => 'required',
            'motherPhone'=> 'required',
            'schoolYear'=>'required',
            'group'=>'required',
            'about'=> 'required',
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('students','public');
        }
        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        Student::create($formFields);
        return redirect('/students');
    }
    public function edit(Student $student){
        return view('Students.edit', ['student'=>$student]);
    }
    //Update student info
    public function update(Request $request, Student $student){
        $formFields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName'=> 'required',
            'motherFirstName'=> 'required',
            'motherLastName'=> 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => ['required','email'],
            'dateOfBirth'=> 'required',
            'fatherPhone' => 'required',
            'motherPhone'=> 'required',
            'schoolYear'=>'required',
            'group'=>'required',
            'about'=> 'required',
    ]);
    if($request->hasFile('img')){
        $formFields['img']= $request->file('img')->store('teachers','public');
    }
    /*if($request['newPassword']==NULL){
    $formFields['password'] = $teacher->password;
    }else{
        $newPassword['1'] = $request->validate(['newPassword' =>['required','confirmed','min:6'],]);
        $newPassword['1'] = bcrypt($newPassword['1']);
        if($newPassword['1'] != $request->currentPassword){
        }
        else{
            $formFields['password']=$newPassword['1'];
        }

    }*/
    $student->update($formFields);
    return back();
    }

        //Show edit password form
        public function editpassword(Student $student){
            return view('Students.editpassword', ['student'=>$student]);
        }

        public function updatePassword(Request $request, Student $student){
        $formFields = $request->validate([
            'password'=> ['required','confirmed','min:6'],
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $student->update($formFields);
        return back();
        }

        public function destroy(Student $student){
            $student->delete();
            return redirect('/students')->with('message','Teacher deleted successfully');
        }
}
