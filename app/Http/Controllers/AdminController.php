<?php

namespace App\Http\Controllers;

use App\admin;
use App\Section;
use App\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//use DB;

class AdminController extends Controller
{
    public function create(){

        $classnames=Studentclass::all();
        $sections = Section::all();

        return view('admin.studentCreate',['classnames'=>$classnames ,'sections'=>$sections]);
    }


     public function store( Request $request){

        $Student= new admin;

        $Student->student_name=$request->student_name;
        $Student->fname=$request->fname;
        $Student->studentclasses_id=$request->studentclasses_id;
        $Student->section=$request->section;
        $Student->email=$request->email;
        $Student->dob=$request->dob;
        $Student->mothername=$request->mothername;
        $Student->gender=$request->gender;
        $Student->father_occupation=$request->father_occupation;

        $Student->present_address=$request->present_address;
        $Student->permanent_address=$request->permanent_address;

        $Student->father_mobile=$request->father_mobile;
        $Student->mother_mobile=$request->mother_mobile;
        $Student->emergency_number=$request->emergency_number;
        $Student->bloodGroup=$request->bloodGroup;

         if($request->hasFile('photo')){
             $Student->photo=$request->photo->store('public/images');
         }



      /* start auto generted */
 $startOfYear = Carbon::now()->startOfYear();
 $endOfYear = Carbon::now()->endOfYear();
 $students = admin::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
 $count = count($students) + 1;
 ///$student = admin::create($request->all());

 $Student->id_no = Carbon::now()->toDateString(). $count;

      /*   End of Auto generated*/


       // var_dump($Student);die;
         $Student->save();
        return redirect()->route('student_create');
    }


    public function index(){

       $admins = DB::table('admins')
            ->select(DB::raw('*'))
            ->where('studentclasses_id','=',2)
            ->get();
        // print_r($admins);
             return view('admin.index',['admins'=>$admins]);
    }
    public function indexOne(){

        $admins = DB::table('admins')
            ->select(DB::raw('*'))
            ->where('studentclasses_id','=',1)
            ->get();
        // print_r($admins);
        return view('admin.index',['admins'=>$admins]);
    }

    public function indexThree(){
        $admins=DB::table('admins')->select(DB::raw('*'))->where('studentclasses_id','=',3)->get();
        return view('admin.indexThree',['admins'=>$admins]);
    }


}
