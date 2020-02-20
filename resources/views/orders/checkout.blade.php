@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div style="display:flex;justify-content:wrap;width:200%;">
            <div class="col-6">
            <div class="card-header"><h1>Checkout</h1></div>
                <div class="card-body">
                    <h4>Total Price : € {{ $total }}</h4>
                </div>
            </div>
            <div class="col-4">
                <div class="card-header">Account details</div>
                <div class="card-body">
                    <p>Name: {{ $user->name }} </p>
                    <p>Mail: {{ $user->email }} </p>
                </div>
            </div>
        </div>
        <form action="{{action('OrderController@store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Bestelling afronden</button>
        </form>
    </div>
</div>

@endsection