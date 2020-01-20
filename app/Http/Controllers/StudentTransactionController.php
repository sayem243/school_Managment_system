<?php

namespace App\Http\Controllers;

use App\admin;
use App\Studentclass;
use Illuminate\Http\Request;

class StudentTransactionController extends Controller
{
   public function create(){

       $admin=admin::all();
       $classes=Studentclass::all();
       return view('Transaction_Student.create',['students'=>$admin,'classes'=>$classes]);
   }



}
