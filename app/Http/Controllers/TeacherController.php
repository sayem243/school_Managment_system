<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index(){

        $teachers=Teacher::all();
        return view('teachers.indexTeacher')->with('teachers',$teachers);
    }


    public function create(){

        return view('teachers.create');

    }

    public function store(Request $request){

        $request->validate([
            'mobile'=>'required',
            'nid'=>'required'

        ]);

        $teacher= New Teacher;
        $teacher->name= $request->name;
        $teacher->fathername= $request->fathername;
        $teacher->email= $request->email;
        $teacher->mobile= $request->mobile;
        $teacher->gender= $request->gender;
        $teacher->BSC= $request->BSC;
        $teacher->MSC=$request->MSC;
        $teacher->PhD=$request->Phd;
        $teacher->nid=$request->nid;
        $teacher->joining_date=$request->joining_date;

        if($request->hasFile('photo')){
            $teacher->photo=$request->photo->store('public/images');
        }

        if($request->hasFile('CV')){
            $teacher->CV=$request->CV->store('public/images');
        }


   /*     $teacher = $request->file('photo');
        $destinationPath = 'photo';
        $teacher->move($destinationPath,$teacher->getClientOriginalName());

        $teacher = $request->file('cv');
        $destinationPath = 'cv';
        $teacher->move($destinationPath,$teacher->getClientOriginalName());*/





//        $imageName = time().'.'.request()->photo->getClientOriginalExtension();
//        request()->photo->move(public_path('photo'), $imageName);
//
//        $cv= time().'.'.request()->cv->getClientOriginalExtension();
//        request()->cv->move(public_path('cv'),$cv);

        $teacher->save();

        return redirect()->route('teacher_create');

    }
}