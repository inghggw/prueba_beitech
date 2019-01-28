@extends('layouts.app')
@section('title','Welcome')

@section('content')

    <div class="card text-center">
      <div class="card-header">
        Welcome
      </div>
      <div class="card-body">
        <h5 class="card-title">The test for Developer in PHP of Beitech</h5>
        <p class="card-text">My name is Henry Giovanny Gonzalez Waltero, to continue press "Customer List" for see customers and <b>create orders</b> or <b>list orders</b>:</p>
        <a class="nav-link" href="{{ route('listCustomer') }}">
            <button type="button" class="btn btn-info btn-lg"><i class="fas fa-list-ol"></i> Customer List</button></a>
      </div>
      <div class="card-footer text-muted">
        28/01/2019
      </div>
    </div>
@endsection