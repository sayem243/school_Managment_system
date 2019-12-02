<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerApi extends Model
{
   protected $table ="customers";
   public $timestamps =false;

   protected $fillable = [

       'created_at',
       'updated_at',
       'package_id',
       'name',
       'mobile',
       'address',
       'email',
       'bandWidth',
       'assignBandWidth',
       'username',
       'connectionMode',
       'connectionDate',
       'connectionStatus',
       'zone_id',
       'monthlyBill',
       'outstanding',
       'paidMonth',
       'paidYear',
       'openingBalance',
       'receivable',
       'payment',
       'zoneName',
       'package'

   ];

}
