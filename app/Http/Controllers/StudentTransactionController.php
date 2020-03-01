<?php

namespace App\Http\Controllers;

use App\admin;
use App\Fees;
use App\Studentclass;
use App\studentTransaction;
use Illuminate\Http\Request;

class StudentTransactionController extends Controller
{
   public function create(){

       $admin=admin::all();
       $classes=Studentclass::all();
       $fees=Fees::all();

       return view('Transaction_Student.create',['students'=>$admin,'classes'=>$classes,'fees'=>$fees]);
   }

   public function store(Request $request){

       $studentTransaction = new studentTransaction();
       $studentTransaction->student_id=$request->student_id;
       $studentTransaction->studentclasses_id=$request->studentclasses_id;
       $studentTransaction->debit=$request->debit;
       $studentTransaction->fees_id=$request->batch_id;
       $studentTransaction->save();

       $this->GeneratePaymentId($studentTransaction);

       return redirect()->route('transaction_index');

   }

    private function GeneratePaymentId(studentTransaction $payment){
        $datetime = new \DateTime("now");
        $sequentialId = sprintf("%s%s",$datetime->format('my'), str_pad($payment->id,4, '0', STR_PAD_LEFT));

        $payment->payment_id=$sequentialId;
        $payment->save();
    }

    public function index(){

       $fees=Fees::all();
       $transactions=studentTransaction::all();

       return view('Transaction_Student.index',['transactions'=>$transactions,'fees'=>$fees]);
   }


}
