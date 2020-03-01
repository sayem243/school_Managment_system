<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Fees extends Model
{
    public  function Studentclass(){

        return $this->hasMany('App\Studentclass');
    }

    public function months(){

        return $this->belongsTo(Setting::class,'month_id');
    }

    public function transaction(){

        return $this->hasMany(studentTransaction::class);
    }

}
