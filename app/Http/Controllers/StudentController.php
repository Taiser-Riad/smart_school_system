<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //show student welcome page
    public function welcome()
    {
        return view("studentWelcome");
    }
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
        $u=User::create([
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'role' => 'student',
        ]);
        $formFields['user_id']= $u->id;
        Student::create($formFields);
        return redirect('/students');
    }
    //show edit student info form
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
        $formFields['img']= $request->file('img')->store('students','public');
    }
    $student->update($formFields);
    $user = User::where('id', $student->user_id)->first();
    if ($user) {
        $user->email = $formFields['email'];
        $user->save();
    }
    return back();
    }

        //Show edit password form
        public function editpassword(Student $student){
            return view('Students.editpassword', ['student'=>$student]);
        }
        //Update student password
        public function updatePassword(Request $request, Student $student){
        $formFields = $request->validate([
            'password'=> ['required','confirmed','min:6'],
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $student->update($formFields);
        $user = User::where('id', $student->user_id)->first();
        if ($user) {
            $user->password = $formFields['password'];
            $user->save();
        }
        return back();
        }
        //Delete student
        public function destroy(Student $student){
            $student->delete();
            return redirect('/students')->with('message','Student deleted successfully');
        }
}
