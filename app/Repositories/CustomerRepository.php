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
            ->limit(25)
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

    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function customerOverview()
    {
        $startDate = date("Y-m-01 00:00:00");
        $endDate = date("Y-m-t 23:59:59");
        $customerCount = DB::table('customers')
            ->select('connectionStatus', DB::raw('count(*) as totalCustomer'), DB::raw('SUM(monthlyBill) as total'))
            ->groupBy('connectionStatus')
            ->whereBetween('updated_at', [$startDate,$endDate])
            ->get();
        return $customerCount;

    }

    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function monthlyBill()
    {

        $customerBill = DB::table('customers')
            ->select('connectionStatus', DB::raw('SUM(monthlyBill) as total') , DB::raw('count(*) as totalCustomer'))
            ->groupBy('connectionStatus')
            ->first();
        return $customerBill;

    }

    public function zoneBaseCustomerOverview()
    {
        $startDate = date("Y-m-01 00:00:00");
        $endDate = date("Y-m-t 23:59:59");
        $customerCount = DB::table('customers')
            ->join('locations', 'customers.zone_id', '=', 'locations.id')
            ->select('locations.name as location' , DB::raw('count(*) as totalCustomer'))
            ->where('connectionStatus','Active')
            ->whereBetween('customers.updated_at', [$startDate,$endDate])
            ->groupBy('locations.name')
            ->get();
        return $customerCount;

    }




}
