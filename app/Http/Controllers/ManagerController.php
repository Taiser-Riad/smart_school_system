<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManagerController extends Controller
{
        //show manager welcome page
        public function welcome()
        {
            return view("managerWelcome");
        }
        //Show all managers
        public function index(){
            return view('managers.index', [        
                'heading' => 'The managers',
                'managers' => Manager::all()
            ]);
        }
        //Show one manager
        public function show(Manager $manager){
            return view('managers.show', [
                'manager'=> $manager
                ]);
        }
        //show add new manager form
        public function create(){
            return view('managers.create');
        }
        //Store manager data
        public function store(Request $request){
            $formFields = $request->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'email' => ['required', Rule::unique('managers','email'),'email'],
                'password' =>['required','confirmed','min:6'],
            ]);
            if($request->hasFile('img')){
                $formFields['img']= $request->file('img')->store('managers','public');
            }
            //Hash password
            $formFields['password'] = bcrypt($formFields['password']);
            $u=User::create([
                'email' => $formFields['email'],
                'password' => $formFields['password'],
                'role' => 'manager',
            ]);
            $formFields['user_id']= $u->id;
            Manager::create($formFields);
            return redirect('/managers');
        }
        //show edit manager info form
        public function edit(Manager $manager){
            return view('managers.edit', ['manager'=>$manager]);
        }
        //Update manager info
        public function update(Request $request, Manager $manager){
            $formFields = $request->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'email' => ['required','email'],
        ]);
        if($request->hasFile('img')){
            $formFields['img']= $request->file('img')->store('managers','public');
        }
        $manager->update($formFields);
        $user = User::where('id', $manager->user_id)->first();
        if ($user) {
            $user->email = $formFields['email'];
            $user->save();
        }
        return back();
        }
        //Show edit password form
        public function editpassword(Manager $manager){
            return view('managers.editpassword', compact('manager'));
        }
        //Update manager password
        public function updatePassword(Request $request, Manager $manager){
            $formFields = $request->validate([
                'password'=> ['required','confirmed','min:6'],
            ]);
            $formFields['password'] = bcrypt($formFields['password']);
            $manager->update($formFields);
            $user = User::where('id', $manager->user_id)->first();
            if ($user) {
                $user->password = $formFields['password'];
                $user->save();
            }
            return back();
            }
            //Delete manager
            public function destroy(Manager $manager){
                $manager->delete();
                return redirect('/managers')->with('message','Manager deleted successfully');
            }
}
