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
                @foreach($order->cart->items as $item)                            
                    <div class="card-body">
                        <p class="card-text">{{ $item['item']['name'] }}</a>
                        <p class="card-text"><strong>Product prijs : </strong>€{{ $item['price'] }} <strong>Aantal </strong>{{ $item['qty'] }} x</p>
                    </div>
                @endforeach
                <div class="card-body"  style="border-top:1px solid black;">
                    <strong>Totaal: €{{ $order->cart->totalPrice }}</strong>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
