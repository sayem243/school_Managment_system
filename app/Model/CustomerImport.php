<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerImport extends Model
{
    protected $fillable = [
        'name',
        'file'
    ];

}
