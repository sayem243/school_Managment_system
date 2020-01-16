<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
//    //
//    public function Studentclass(){
//        return $this->belongsTo('App\Studentclass');
//    }

    public function month(){
        return $this->hasMany('App\Fees');
    }








}
