<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //Show all class rooms
    public function index(){
    return view('classrooms.index', [        
            'heading' => 'The class rooms',
            'classrooms' => Classroom::all()
        ]);
    }
           //Show all class room students
    public function indexstudents(Classroom $classroom){
        return view('classrooms.indexstudents', [        
            'heading' => 'The class rooms students',
            'students' => Student::where('classroom_id', $classroom->id)->get()
            ]);
    }
    public function indexteachers(Classroom $classroom){
        $classroomId= $classroom->id;
        return view('classrooms.indexteachers', [        
            'heading' => 'The class rooms teachers',
            'teachers' => Teacher::whereHas('classrooms', function ($query) use ($classroomId) {
                $query->join('classroom_teacher as ct1', 'classrooms.id', '=', 'ct1.classroom_id')
                    ->join('classroom_teacher as ct2', 'teachers.id', '=', 'ct2.teacher_id')
                    ->where('ct2.classroom_id', $classroomId);
            })->get()
            ]);
    }
       //Show one class room
       public function show(Classroom $classroom){
        return view('classrooms.show', [
            'classroom'=> $classroom
            ]);
    }
    public function create(){
        return view('classrooms.create');
    }
    //Store classroom data
    public function store(Request $request){
        //dd($request->all());
        $formFields = $request->validate([
            'name'=> 'required',
            'schoolYear'=> 'required',
            'group'=> 'required',
        ]);
        $formFields['schedule']= 'Sunday'.','.$request['Sunday1'].','.$request['Sunday2'].','.$request['Sunday3'].','.$request['Sunday4'].','.$request['Sunday5'].','.$request['Sunday6'].','.$request['Sunday7'].';'.
                                 'Monday'.','.$request['Monday1'].','.$request['Monday2'].','.$request['Monday3'].','.$request['Monday4'].','.$request['Monday5'].','.$request['Monday6'].','.$request['Monday7'].';'.
                                 'Tuesday'.','.$request['Tuesday1'].','.$request['Tuesday2'].','.$request['Tuesday3'].','.$request['Tuesday4'].','.$request['Tuesday5'].','.$request['Tuesday6'].','.$request['Tuesday7'].';'.
                                 'Wednesday'.','.$request['Wednesday1'].','.$request['Wednesday2'].','.$request['Wednesday3'].','.$request['Wednesday4'].','.$request['Wednesday5'].','.$request['Wednesday6'].','.$request['Wednesday6'].';'.
                                 'Thursday'.','.$request['Thursday1'].','.$request['Thursday2'].','.$request['Thursday3'].','.$request['Thursday4'].','.$request['Thursday5'].','.$request['Thursday6'].','.$request['Thursday7'];

        // Check if a classroom with the same schoolYear and group already exists
        $existingClassroom = Classroom::where('schoolYear', $formFields['schoolYear'])
        ->where('group', $formFields['group'])
        ->first();

    if ($existingClassroom) {
        return response()->json([
            'message' => 'A classroom with the same schoolYear and group already exists.'
        ], 409); // Return a conflict response status code
    }
        Classroom::create($formFields);
        return redirect('/classrooms');
    }
        //Show edit form
        public function edit(Classroom $classroom){
            return view('Classrooms.edit', ['classroom'=>$classroom]);
        }
        //Update Classroom info
    public function update(Request $request, Classroom $classroom){
        $formFields = $request->validate([
            'name'=> 'required',
            'schoolYear'=> 'required',
            'group'=> 'required',
        ]);
        $formFields['schedule']= 'Sunday'.','.$request['Sunday1'].','.$request['Sunday2'].','.$request['Sunday3'].','.$request['Sunday4'].','.$request['Sunday5'].','.$request['Sunday6'].','.$request['Sunday7'].';'.
                                 'Monday'.','.$request['Monday1'].','.$request['Monday2'].','.$request['Monday3'].','.$request['Monday4'].','.$request['Monday5'].','.$request['Monday6'].','.$request['Monday7'].';'.
                                 'Tuesday'.','.$request['Tuesday1'].','.$request['Tuesday2'].','.$request['Tuesday3'].','.$request['Tuesday4'].','.$request['Tuesday5'].','.$request['Tuesday6'].','.$request['Tuesday7'].';'.
                                 'Wednesday'.','.$request['Wednesday1'].','.$request['Wednesday2'].','.$request['Wednesday3'].','.$request['Wednesday4'].','.$request['Wednesday5'].','.$request['Wednesday6'].','.$request['Wednesday6'].';'.
                                 'Thursday'.','.$request['Thursday1'].','.$request['Thursday2'].','.$request['Thursday3'].','.$request['Thursday4'].','.$request['Thursday5'].','.$request['Thursday6'].','.$request['Thursday7'];

        if($formFields['schoolYear']==$classroom['schoolYear'] && $formFields['group']==$classroom['group']){

        }
        else{
            // Check if a classroom with the same schoolYear and group already exists
            $existingClassroom = Classroom::where('schoolYear', $formFields['schoolYear'])
            ->where('group', $formFields['group'])
            ->first();
        
         if ($existingClassroom) {
              return response()->json([
                 'message' => 'A classroom with the same schoolYear and group already exists.'
             ], 409); // Return a conflict response status code
            }
        }
    $classroom->update($formFields);
    return back();
    }
        //Delete classroom
        public function destroy(Classroom $classroom){
            $classroom->delete();
            return redirect('/classrooms')->with('message','classroom deleted successfully');
        }
        public function addTeacher(Request $request,Classroom $classroom){
            return view('Classrooms.addteacher', ['classroom'=>$classroom,
                                                    'teachers'=>Teacher::all()]);
        }
        public function storeTeacher(Request $request,Classroom $classroom){
            //dd($request->all());
            $classroom->teachers()->syncWithoutDetaching($request->teacher);
            return redirect('/classrooms/'.$classroom->id);
        }
}
