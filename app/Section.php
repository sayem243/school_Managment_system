<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function admin(){

        return $this->hasMany(admin::class);
    }
}
