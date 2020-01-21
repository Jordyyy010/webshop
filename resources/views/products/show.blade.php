@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="nav-link" href="{{ URL::to('products/index') }}">Back to products</a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-8">
                            @foreach($products as $product)
                            <h1>{{ $product->name }}</h1>
                            <p><strong>Description: {{ $product->description }}</strong></p>
                            <img class="card-img-top img-fluid ImageProduct" src="/img/{{ $product->image }}" alt="Image">
                            <p>€{{ $product->amount }}</p>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection