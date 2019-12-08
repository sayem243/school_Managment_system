<?php

namespace App\Http\Controllers;

use App\Studentclass;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{

      public function create(){

        return view('class.createClass');
    }

     public function store(Request $request){


          $studentclass= new Studentclass;
          $studentclass->class_name=$request->class_name;
          $studentclass->section=$request->section;
          $studentclass->group=$request->group;
          $studentclass->save();

          return redirect()->route('class_create');


     }

}
