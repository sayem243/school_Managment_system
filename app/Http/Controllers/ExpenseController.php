<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function create(){

        return view('expense.create');
    }

    public function store(Request $request){

        $expense =new Expense;
        $expense->title=$request->title;
        $expense->amount=$request->amount;
        $expense->date=$request->date;

        $expense->save();
        return redirect()->route('expense_index');
    }

    public  function index(){
        $expense=Expense::all();
        return view('expense.index',['expenses'=>$expense]);
    }

}
