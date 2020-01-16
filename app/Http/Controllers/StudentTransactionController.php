<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;

class StudentTransactionController extends Controller
{
   public function create(){

       $admin=admin::all();
       return view('Transaction_Student.create',['students'=>$admin]);
   }



}
