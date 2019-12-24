<?php

namespace App\Http\Controllers;

use App\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    public function create(){

        $attendence= DB::table('admins')
            ->selectRaw('*')
            ->where('studentclasses_id','=',1)
            ->get();

        return view('attendence.create')->with('attendences',$attendence);
    }

    public function store(Request $request){
        foreach ($request->student_id as $studentId){

            $attendence = new Attendence();
            $attendence->students_id=$studentId;
            $attendence->attendence=$request->attendence[$studentId];

            $attendence->save();
        }


    }


}
