<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    protected $fillable = [
        'amount',
        'customer_id',
        'collection_id',
        'process',
        'paymentMethod',
        'paymentMobile',
        'month',
        'transactionId',
        'year',
        'remark',

    ];

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
    public function collectionUser()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdUser()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
