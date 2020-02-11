@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @foreach($products as $product)
        <div class="col-md-4 productForm">
            <div class="card">
                <div class="card box-shadow">
                    <img class="card-img-top img-fluid ImageProduct" src="/img/{{ $product->image }}" alt="image">
                    <div class="card-body">
                        <a href="{{action('ProductController@show', ['id' => $product->id])}}">{{ $product->name }}</a>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">€{{ $product->amount }}</p>
                        <a href="{{action('CartController@addToCart', ['$id' => $product->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection