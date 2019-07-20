<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillGenerate extends Model
{
    protected $fillable = [
        'zone_id',
        'package_id',
        'collection_id',
        'billMonth',
        'billYear',
    ];

}
