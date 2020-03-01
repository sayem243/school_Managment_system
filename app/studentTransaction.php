<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentTransaction extends Model
{
    public function studen_class(){

        return $this->belongsTo('App\Studentclass');
    }
    //fees
    public function batch(){
        return $this->belongsTo(\App\Fees::class,'fees_id');
    }

    //student information



}