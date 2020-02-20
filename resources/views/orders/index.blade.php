@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1><strong>Uw Orders</strong></h1>
    </div>
    <div class="row">
    @foreach($orders as $order)

        <div class="col-md-4 productForm">
            <div class="card">
                <div class="card-header">Order #{{$order['id']}}</div>
                @foreach($order->orderProduct as $orderProduct)
                <div class="card-body">
                    <p class="card-text">{{ $orderProduct->product->name }}</a>
                    <p class="card-text"><strong>Product prijs : </strong>€{{ $orderProduct->price }} <strong>Aantal </strong>{{ $orderProduct->qty }} x</p>
                </div>
                @endforeach
                <div class="card-body"  style="border-top:1px solid black;">
                    <strong>Totaal: €{{ $order->total_price }}</strong>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
