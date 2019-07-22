<?php

namespace App\Model;

use App\Model\InternetPackage;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'address',
        'email',
        'username',
        'connectionStatus',
        'connectionMode',
        'bandWidth',
        'connectionMode',
        'connectionStatus',
        'assignBandWidth',
        'connectionDate',
        'assignBandWidth',
        'monthlyBill',
        'outstanding',
        'zone_id',
        'package_id',
        'receivable',
        'payment',
        'paidYear',
        'zoneName',
        'package',
        'paidMonth'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }


    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function internetPackage()
    {
        return $this->belongsTo(InternetPackage::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thana()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pourashava()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function union()
    {
        return $this->belongsTo(Location::class);
    }
    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        return $this->belongsTo(Location::class);
    }




}
