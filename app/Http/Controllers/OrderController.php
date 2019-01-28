<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Requests\OrderReq;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id)
    {
        $products = Product::select('product.*')
                            ->join('customer_product','customer_product.product_id','=','product.product_id')
                            ->where('customer_product.customer_id','=',$customer_id)->get();
        return view('order.createOrder',
                        ['customer'=>Customer::find($customer_id),
                         'products'=>$products]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\OrderReq $req VALIDACIONES FIELDS
     * @return \Illuminate\Http\Response
     */
    public function store(OrderReq $req)
    {
        Log::debug($req);
        $order = new Order;
        $order->customer_id = $req->customer_id;
        $order->creation_date = $req->creation_date;
        $order->delivery_address = $req->delivery_address;
        $order->total = $req->total;
        $order->save();

        foreach ($req->products as $key => $val) {
            $orderDetail = new OrderDetail;
            $aux = explode('|', $val);            
            $orderDetail->product_description = $aux[2];
            $orderDetail->price = $aux[1];
            $orderDetail->order_id = $order->order_id;
            $orderDetail->quantity = 1;
            $orderDetail->save();
        }

        return ['status'=>200,'out'=>'modalRedirect','route'=>route('listCustomer'),
                'html'=>'Registration saved successfully, then it will be redirected to the customer list page'];
    }

    
}