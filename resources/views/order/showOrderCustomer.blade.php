@extends('layouts.app')
@section('title','Show Orders by Customer')

@section('content')
  
  <h3 class="text-primary">
  	<a class="link" href="{{route('listCustomer')}}"><i class="fas fa-arrow-circle-left"></i></a> 
  	Show Orders by Customer</h3>
  {{-- dd($customer) --}}
	<div class="form-inline mt-4 mb-4">
		<div class="form-group">
	      	<label for="txtName" class="my-1 mr-2">Customer Name</label>
	    	<input class="form-control" type="text" placeholder="{{$customer->name}}" readonly id="txtName">
	    </div>
	</div>

	<table class="table table-striped" id="tOrderCustomer" data-route="{{route('orderCustomer.showTable',$customer->customer_id)}}">
    <thead>
      <tr>
        <th>#</th>
        <th>Creation Date</th>
        <th>Order Id</th>
        <th>Total</th>
        <th>Delivery Address</th>
        <th>Products</th>
      </tr>
    </thead>
  </table>
    
@endsection