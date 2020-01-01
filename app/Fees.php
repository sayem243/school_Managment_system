<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    public  function Studentclass(){

        return $this->hasMany('App\Studentclass');

    }

}
