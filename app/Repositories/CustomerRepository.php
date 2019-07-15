<?php

namespace App\Repositories;

use App\Model\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{


    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function queryWithSearch($data)
    {
        $users = DB::table('customer')
            ->join('internet_packages', 'customer.package_id', '=', 'internet_packages.id')
            ->select('customer.*', 'internet_packages.name', 'internet_packages.price')
            ->offset(10)
            ->limit(5)
            ->get();
    }

    /**
     * Get contacts paginate.
     *
     * @param  int  $nbrPages
     * @param  array  $parameters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($nbrPages, $parameters)
    {
        return Customer::with ('ingoing')
            ->latest()
            ->when ($parameters['new'], function ($query) {
                $query->has ('ingoing');
            })->paginate($nbrPages);
    }



}
