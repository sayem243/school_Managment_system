<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
//student
    public function admin(){
        return $this->hasMany(admin::class);
    }
}
