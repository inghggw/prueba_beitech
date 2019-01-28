@extends('layouts.app')
@section('title','List Customers')

@section('content')
  
  <h3 class="text-primary">Customers List</h3>
  <table class="table table-striped" id="tCustomers" data-route="{{route('customer.showTable')}}">
    <thead>
      <tr>
        <th>Action</th>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
  </table>
    
@endsection