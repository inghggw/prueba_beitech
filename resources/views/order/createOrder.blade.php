@extends('layouts.app')
@section('title','Create Order by Customer')

@section('content')
  
  <h3 class="text-primary">
  	<a class="link" href="{{route('listCustomer')}}"><i class="fas fa-arrow-circle-left"></i></a> 
	Create Order by Customer</h3>
  
   <form method="POST" class="form-ajax" action="{{route('order.store')}}">
        @csrf
        <input type="hidden" name="customer_id" value="{{$customer->customer_id}}">
        <fieldset>
		    <div class="row">
                <div class="col-md-4 form-group">
                    <label class="control-label">Customer Name</label>
                    <input type="text" class="form-control" placeholder="{{$customer->name}}" readonly />
                </div>
                <div class="col-md-4 form-group">
                    <label class="control-label">Creation Date (Y-M-D)</label>
                    <input class="form-control datePicker" name="creation_date" readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label class="control-label">Delivery Address</label>
                    <input type="text" class="form-control" name="delivery_address">
                </div>
		    </div>

		    <label class="control-label">Add Products (Max 5)</label>
	    	<select multiple="multiple" size="10" name="products[]" id="products">
	    		@foreach($products as $row)
			      <option value="{{$row->product_id.'|'.$row->price.'|'.$row->product_description}}">
                        {{$row->name}} - ${{$row->price}}</option>
			    @endforeach
		    </select>

		    <div class="row mt-2">
 				<div class="col-md-4 form-group">
                    <label class="control-label">Total</label>
                    <input type="text" class="form-control" value="0" name="total" readonly/>
                </div>                
		    </div>

		    <div class="row mt-2">
                <div class="col-md-4 form-group">
                	<button class="btn btn-primary formAjax" type="button">
						<i class="fas fa-save"></i> Save</button>
                </div>
            </div>
			
        </fieldset>
    </form>
    
@endsection