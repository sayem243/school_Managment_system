<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InternetPackage extends Model
{

    protected $fillable = [
        'name',
        'price',
        'description'
    ];

    public function customers()
    {
        return $this->hasMany('App\Model\Customer');
    }
}
