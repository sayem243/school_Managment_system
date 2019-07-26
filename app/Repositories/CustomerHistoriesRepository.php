<?php

namespace App\Repositories;

use App\Model\Customer;
use Illuminate\Support\Facades\DB;

class CustomerHistoriesRepository
{



    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function insertCustomerHistory(Customer $customer)
    {
        $date = new \DateTime("now");
        DB::table('customer_histories')->insert(
            [
                'created_at' => $date,
                'updated_at' => $date,
                'customer_id' => $customer->id,
                'zone_id' => $customer->zone_id,
                'package_id' => $customer->package_id,
                'connectionStatus' => $customer->connectionStatus
            ]
        );
    }

    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function insertImportCustomerHistory()
    {
        $startDate = date("Y-m-d 00:00:00");
        $endDate = date("Y-m-d 23:59:59");
        $date = new \DateTime("now");
        $customers = DB::table('customers')
            ->select('customers.*')
            ->whereBetween('updated_at', [$startDate,$endDate])
            ->get();
        foreach ($customers as $customer){
            DB::table('customer_histories')->insert(
                [
                    'created_at' => $date,
                    'updated_at' => $date,
                    'customer_id' => $customer->id,
                    'zone_id' => $customer->zone_id,
                    'package_id' => $customer->package_id,
                    'connectionStatus' => $customer->connectionStatus
                ]
            );
        }


    }



}
