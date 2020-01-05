<?php

namespace App\Http\Controllers;

use App\Fees;
use App\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FeesController extends Controller
{
    public function create(){

        $class=Studentclass::all();
        $months=DB::table('settings')
            ->select(DB::raw('*'))
            ->where('type','=','month')
            ->get();
        return view('fees.create',['classes'=>$class, 'months'=>$months]);
    }


    public function admission_fee($admission_fee)
    {

        $admission_fees = DB::table('studentclasses')
            ->where([
                ['id', '=', $admission_fee]
            ])
            ->get();
        return response()->json($admission_fees);

    }

    public function exam_fee($exam_fee)
    {

        $exam_fees = DB::table('studentclasses')
            ->where([
                ['id', '=', $exam_fee]

            ])->get();
        return response()->json($exam_fees);
    }
       public function monthly_fee($monthly_fee)
    {

        $monthly_fees = DB::table('studentclasses')
            ->where([
                ['id', '=', $monthly_fee]

            ])->get();
        return response()->json($monthly_fees);
    }


    public function store (Request $request){

        $fees = new Fees;
        $fees->month=$request->month;
        $fees->year=$request->year;

        $fees->class_id=$request->class_name;
        $fees->admissionFee=$request->admissionFee;
        $fees->monthlyFee=$request->monthlyFee;
        $fees->examFee=$request->examFee;
//

        $fees->save();

        return redirect()->route('fees_create');

    }



}