<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(){

        return view('section.create');
    }

    public function store(Request $request){

        $section = New Section;
        $section->section_name=$request->section_name;

        $section->save();
        return redirect()->route('section_create');


    }


}
