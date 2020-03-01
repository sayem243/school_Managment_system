<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    public function admin(){

        //student
        return $this->hasMany('App\admin');
    }


    public function Fees(){
        return $this->belongsTo('App\Fees');
    }

    public function transaction(){
        return $this->hasMany('App\studentTransaction');
    }


}
