<?php

namespace App\Repositories;

use App\Model\BillGenerate;
use App\Model\Customer;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{


    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function getFindExistMonth($customer,$month,$year)
    {
        $transaction = DB::table('transactions')
            ->select('id as id')
            ->where(array('customer_id' => $customer,'month' => $month,'year' => $year))
            ->first();
        if($transaction){
            return "In-valid";
        }else{
            return "Valid";
        }

    }

    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function billTransactionOutstanding(Customer $customer,$month,$year)
    {

        $customerId = $customer->id;
        $ct = DB::table('transactions')
            ->select(DB::raw("SUM(transactions.receivable) as receivable") , DB::raw("SUM(transactions.amount) as payment"))
            ->where('customer_id', '=', $customerId)
            ->first();
        $balance = (($customer->openningBalance + $ct->receivable) - $ct->payment);
        DB::table('customers')->where('id',$customerId)->update([ 'outstanding' => $balance,'receivable' =>  $ct->receivable,'payment' => $ct->payment,'paidMonth'=>$month,'paidYear'=> $year ]);

    }

    /**
     * Create a query for Post.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function billGenerate(BillGenerate $generate)
    {
        $zoneId = $generate->zone_id;
        $customers = DB::table('customers')
            ->select('customers.*')
            ->where('zone_id',$zoneId)
            ->get();
        foreach ($customers as $customer):
            $transaction = DB::table('transactions')
                ->select('id as id')
                ->where(array('customer_id' => $customer->id,'month' => $generate->billMonth,'year' => $generate->billYear))
                ->first();
            if($transaction){
                DB::table('transactions') ->where('id',$transaction->id)->update([ 'billGenerate_id' => $generate->id ]);
            }else{
                $balance = $customer->monthlyBill + $customer->outstanding;
                $receivable = $customer->monthlyBill + $customer->receivable;
                DB::table('transactions')->insert( [ 'customer_id' => $customer->id ,'billGenerate_id' => $generate->id, 'receivable' => $customer->monthlyBill,'month' => $generate->billMonth, 'year' => $generate->billYear,'balance' => $balance ]);
                DB::table('customers')->where('id',$customer->id)->update([ 'outstanding' => $balance,'receivable' => $receivable,'paidMonth'=>$generate->billMonth,'paidYear'=> $generate->billYear ]);
            }
        endforeach;
        exit;

    }

    public function todayCollection()
    {
        $startDate = date("Y-m-d 00:00:00");
        $endDate = date("Y-m-d 23:59:59");
        $customerCount = DB::table('transactions')
            ->select( DB::raw('SUM(receivable) as receivable'), DB::raw('SUM(amount) as amount'),DB::raw('count(*) as totalCustomer'))
            ->whereBetween('transactions.updated_at', [$startDate,$endDate])
            ->first();
        return $customerCount;

    }

    public function monthlyCollection()
    {
        $startDate = date("Y-m-01 00:00:00");
        $endDate = date("Y-m-t 23:59:59");
        $customerCount = DB::table('transactions')
            ->select( DB::raw('SUM(receivable) as receivable'), DB::raw('SUM(amount) as amount'),DB::raw('count(*) as totalCustomer'))
            ->whereBetween('transactions.updated_at', [$startDate,$endDate])
            ->first();
        return $customerCount;

    }

    public function zoneBaseCustomerOverview()
    {
        $startDate = date("Y-m-01 00:00:00");
        $endDate = date("Y-m-t 23:59:59");
        $customerCount = DB::table('customers')
            ->join('locations', 'customers.zone_id', '=', 'locations.id')
            ->select('connectionStatus','locations.name as location' , DB::raw('count(*) as total'))
            ->groupBy('connectionStatus','locations.id')
            ->whereBetween('customers.updated_at', [$startDate,$endDate])
            ->get();
        return $customerCount;

    }




}
