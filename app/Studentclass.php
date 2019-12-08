<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    public function admin(){

        return $this->hasMany('App\admin');

    }
}
