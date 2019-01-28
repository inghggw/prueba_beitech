@extends('layouts.app')
@section('title','Show Orders by Customer')

@section('content')
  
  <h3 class="text-primary">
  	<a class="link" href="{{route('listCustomer')}}"><i class="fas fa-arrow-circle-left"></i></a> 
  	Show Orders by Customer</h3>
  
	<div class="form-row mt-4 mb-4">
		<div class="form-group col-md-4">
	   	<label for="txtName" class="my-1 mr-1">Customer Name</label>
	   	<input class="form-control" type="text" placeholder="{{$customer->name}}" readonly id="txtName">
	 </div>
   <div class="form-group col-md-3">
      <label for="txtStartDate" class="my-1 mr-1">Start Date (Y-M-D)</label>
      <input class="form-control datePicker" id="txtStartDate" readonly>
   </div>
   <div class="form-group col-md-3">
      <label for="txtEndDate" class="my-1 mr-1">End Date (Y-M-D)</label>
      <input class="form-control datePickerMin" id="txtEndDate" readonly disabled placeholder="First select a start date">
   </div>
   <div class="form-group col-md-2">
      <label for="btnFilterDate" class="my-1 mr-1">&nbsp;</label>
      <button type="button" class="form-control btn btn-primary" id="btnFilterDate">
        <i class="fas fa-search"></i> Search...</button>
   </div>
	</div>

	<table class="table table-striped" id="tOrderCustomer" 
			data-route="{{route('orderCustomer.showTable',$customer->customer_id)}}">
    <thead>
      <tr>
        <th>#</th>
        <th>Creation Date</th>
        <th data-hide="phone">Order Id</th>
        <th >Total</th>
        <th data-hide="phone,tablet">Delivery Address</th>
        <th data-hide="phone">Products</th>
      </tr>
    </thead>
  </table>
    
@endsection