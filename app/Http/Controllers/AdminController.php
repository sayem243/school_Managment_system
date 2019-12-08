<?php

namespace App\Http\Controllers;

use App\admin;
use App\Studentclass;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){

        $classnames=Studentclass::all();

        return view('admin.studentCreate',['classnames'=>$classnames]);
    }






     public function store( Request $request){

        $Student= new admin;

        $Student->student_name=$request->student_name;
        $Student->fname=$request->fname;
        $Student->studentclasses_id=$request->studentclasses_id;

        $Student->section=$request->section;

        $Student->mobile=$request->mobile;
        $Student->email=$request->email;
        $Student->dob=$request->dob;
        $Student->mothername=$request->mothername;
        $Student->gender=$request->gender;
        $Student->father_occupation=$request->father_occupation;
        $Student->address=$request->address;

       // var_dump($Student);die;

         $Student->save();

        return redirect()->route('student_create');
    }

}
