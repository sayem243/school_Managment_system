<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    protected $fillable = [
        'customer_id',
        'user_id',
        'connectionStatus',
        'remark'
    ];

}
