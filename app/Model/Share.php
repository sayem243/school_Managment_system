<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Share extends Model
{

    protected $fillable = [
        'share_name',
        'share_price',
        'share_qty'
    ];


}
