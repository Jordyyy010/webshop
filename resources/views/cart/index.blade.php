@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1><strong>Shuffle</strong></h1>
    </div>
    @if(Session::has('cart'))

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody>
                <tr>
                <th scope="row">{{ $product['item']['id'] }}</th>
                <td>{{ $product['item']['name'] }}</td>
                <td>€ {{ $product['price'] }}</td>
                <td><input class="quantityCounter" type="number" data-val="{{ $product['qty'] }}" data-id="{{ $product['item']['id'] }}" value="{{ $product['qty'] }}"></td>
                <td><form action="{{ action('ProductController@destroy', ['id' => $product['item']['id']]) }}" method="get">    
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" >X</button>
                        </form></td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total Price:€ {{ $totalPrice }}</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
            <a href="/checkout" class="btn btn-success" type="button">Bestel</a>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <h2>Nog geen producten in de winkelmand!</h2>
        </div>
    </div>

    @endif
</div>
@endsection