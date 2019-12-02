<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CustomerApi;

class ApiCustomerController extends Controller
{

    public function CustomerApi(){

        //$data=CustomerApi::all();
        //return $data;

    return response()->json(CustomerApi::get(),200);
    }

    public function CustomerById($id){

        return response()->json(CustomerApi::find($id),200);
    }


    public function AddCustomer(Request $request){

        $customer =CustomerApi::create($request->all());
        return response()->json($customer,201);
    }
}
