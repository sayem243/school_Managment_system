<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create(){

      return view('setting.create');
    }

    public function index(){
        return view('settng.index');
    }



}
