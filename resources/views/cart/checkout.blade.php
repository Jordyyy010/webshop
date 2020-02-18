@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Total Price : € {{ $total }}</h4>
            <form action="{{action('OrderController@bestel')}}" method="post">
                <div class="col-4">
                    <p>Name: <input type="text" required name="name"> </p>
                    <p>Adress: <input type="text" required name="adress"> </p>
                    @csrf
                    <button type="submit" class="btn btn-outline-success">Bestel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection