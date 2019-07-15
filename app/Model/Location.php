<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'location_type',
        'parent',
        'status'
    ];

    public function customers()
    {
        return $this->hasMany('App\Model\Customer');
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function childs() {
        return $this->hasMany('App\Model\Location','parent','id') ;
    }

}
