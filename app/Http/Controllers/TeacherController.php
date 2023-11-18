<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    //show teacher welcome page
    public function welcome()
    {
        return view("teacherWelcome");
    }
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
        $u=User::create([
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'role' => 'teacher',
        ]);
        $formFields['user_id']= $u->id;
        Teacher::create($formFields);
        return redirect('/teachers');
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
        $teacher->update($formFields);
        $user = User::where('id', $teacher->user_id)->first();
        if ($user) {
            $user->email = $formFields['email'];
            $user->save();
        }
        return back();
    }

        //Show edit password form
        public function editpassword(Teacher $teacher){
            return view('Teachers.editpassword', ['teacher'=>$teacher]);
        }

        public function updatePassword(Request $request, Teacher $teacher){
        $formFields = $request->validate([
            'password'=> ['required','confirmed','min:6'],
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $teacher->update($formFields);
        $user = User::where('id', $teacher->user_id)->first();
        if ($user) {
            $user->password = $formFields['password'];
            $user->save();
        }
        return back();
        }


    //Delete teacher
    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect('/teachers')->with('message','Teacher deleted successfully');
    }
}
