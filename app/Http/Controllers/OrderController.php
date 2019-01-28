<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id)
    {
        return view('order.createOrder',['customer_id'=>$customer_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id)
    {

        return view('order.showOrderCustomer',
                        ['customer'=>Customer::find($customer_id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

     /**
     * Data of listing for Ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderCustomerShowTable($customer_id)
    {
        $model = Order::query()->with('orderDetails')->where('customer_id','=',$customer_id);
        return datatables()->eloquent($model)
                     ->addColumn('orderDetails', function (Order $order) {
                    return $order->orderDetails->map(function($details) {
                        return str_limit($details->quantity.' x '.$details->product_description, 30, '...');
                    })->implode('<br>');
                })->escapeColumns([]) //Renderiza contenido html
                ->toJson();
    }

    
}