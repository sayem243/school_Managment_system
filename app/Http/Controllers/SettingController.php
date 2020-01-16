<?php

namespace App\Http\Controllers;

use App\Model\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create(){

      return view('setting.create');
    }

    public function index(){
        return view('settng.index');
    }

    public function store(Request $request){

        $setting =new Setting ;
        $setting->name=$request->name;
        $setting->type=$request->type;
        $setting->slug=$request->slug;

        $setting->save();
        return redirect()->route('setting_create');
    }

}