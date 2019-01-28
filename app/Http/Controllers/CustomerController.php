<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.customers');
    }

    /**
     * Data of listing for Ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable(){
        return datatables()->eloquent(Customer::query())->toJson();
    }
}
