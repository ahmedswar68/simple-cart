@extends('layout')

@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row">
            <p>Orders count ({{count($orders)}})</p>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Total</th>
                    <th scope="col">Address</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Created at</th>
                </tr>
                </thead>
                <tbody>
                @if(count($orders)>0)
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->total}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->telephone}}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No orders found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
        </div><!-- End row -->
    </div>
@endsection
