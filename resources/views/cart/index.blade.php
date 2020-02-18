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
                    <th scope="col">
                        <form action="/shopping-cart/destroyCart" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Clear All</button>
                        </form>
                    </th>
                </tr>
            </thead>
            @foreach($products as $product)
                <tbody>
                    <tr>
                        <th scope="row">{{ $product['item']['id'] }}</th>
                        <td>{{ $product['item']['name'] }}</td>
                        <td>€ {{ $product['price'] }}</td>
                        <td>
                            <form action="{{action('CartController@update', ['$id' => $product['item']['id']])}}" method="post">
                                @csrf
                                <input class="quantityCounter" min="0" type="number" value="{{ $product['qty'] }}" name="changeQty">
                            </form>
                        </td>
                        <td>
                            <form action="/shopping-cart/destroyItem/{{ $product['item']['id']}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" >X</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
                    <tr>
                        <td></td>
                        <td>Total Price:</td>
                        <td>€ {{ $totalPrice }}</td>
                        <td></td>
                        <td>
                            <a href="/shopping-cart/checkout" class="btn btn-success" type="button">Bestel</a>
                        </td>
                    </tr>
                </tbody>
        </table>

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