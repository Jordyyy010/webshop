@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="nav-link" href="{{ URL::to('/') }}">Back to products</a>
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <h1>{{ $product->name }}</h1>
                        <p><strong>Description: {{ $product->description }}</strong></p>
                        <img class="card-img-top img-fluid ImageProduct" src="/img/{{ $product->image }}" alt="Image">
                        <br><br>
                        <p>€{{ $product->amount }}</p>
                        <a href="{{action('CartController@store', ['$id' => $product->id])}}" class="btn btn-success pull-right" role="button">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection