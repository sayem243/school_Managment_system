<?php

namespace App\Http\Controllers;

use App\Studentclass;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{

      public function create(){

        return view('class.createClass');
    }


    public function allClass(){

    $allclasses= Studentclass::all();
    return view('class.allclass')->with('allclasses',$allclasses);

    }

     public function store(Request $request){


          $studentclass= new Studentclass;
          $studentclass->class_name=$request->class_name;
          $studentclass->section=$request->section;
          $studentclass->group=$request->group;
          $studentclass->admission_fee = $request->admission_fee;
          $studentclass->monthly_fee= $request->monthly_fee;
          $studentclass->exam_fee= $request->exam_fee;

          $studentclass->save();

          return redirect()->route('class_create');


     }

}
