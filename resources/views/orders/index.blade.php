@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <div class="alert alert-succes">
                <h1>Uw orders</h1>
            </div>
            @foreach($orders as $order)
                <div class="col-md-4 productForm">
                    <div class="card">
                        @foreach($order->cart->items as $item)                            
                            <div class="card-body">
                                <div style="border-bottom:1px solid black;">
                                    <p class="card-text">{{ $item['item']['name'] }}</a>
                                    <p class="card-text">€{{ $item['price'] }}</p>
                                    <p class="card-text">{{ $item['qty'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <strong>Totaal: €{{ $order->cart->totalPrice }}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
