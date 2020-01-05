<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public  function Studentclass(){

      return $this->belongsTo('App\Studentclass');
    }

    public function sections(){

        return $this->belongsTo('App\Section');
    }


}
