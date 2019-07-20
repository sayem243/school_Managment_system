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

    public function billTransactionOutstanding(Transaction $transaction)
    {
        $customer = Customer::find($transaction->customer_id);
        $customers = DB::table('transactions')
            ->select('SUM(transactions.receivable) as receivable','SUM(transactions.amount)')
            ->where('customer_id',$transaction->customer_id)
            ->get();

        $balance = (($customer->outstanding + $customer->monthlyBill) - $transaction->amount);
        DB::table('customers')->where('id',$transaction->customer_id)->update([ 'outstanding' => $balance,'paidMonth'=>$transaction->month,'paidYear'=> $transaction->year ]);

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
                DB::table('transactions')->insert( [ 'customer_id' => $customer->id ,'billGenerate_id' => $generate->id, 'receivable' => $customer->monthlyBill,'month' => $generate->billMonth, 'year' => $generate->billYear,'balance' => $balance ]);
                DB::table('customers')->where('id',$customer->id)->update([ 'outstanding' => $balance,'paidMonth'=>$generate->billMonth,'paidYear'=> $generate->billYear ]);
            }
        endforeach;
        exit;

    }



}
