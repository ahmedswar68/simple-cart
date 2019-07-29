@extends('layout')

@section('title', 'Checkout page')

@section('content')

    <form method="post" action="{{url('checkout-end-order')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputAddress1">Address</label>
            <input type="text" name="address" required class="form-control" id="exampleInputAddress1" aria-describedby="addressHelp"
                   placeholder="Enter address">
            <small id="addressHelp" class="form-text text-muted">We'll never share your address with anyone else.
            </small>
        </div>
        <div class="form-group">
            <label for="exampleInputTelephone1">Telephone</label>
            <input type="text" name="telephone" required class="form-control" id="exampleInputTelephone1" placeholder="Telephone">
        </div>
        <button type="submit" class="btn btn-dark">checkout & end Order</button>
    </form>
    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
@endsection

