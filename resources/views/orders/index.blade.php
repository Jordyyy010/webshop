@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(1 === 1)
                    <div class="alert alert-succes">
                        <h1>U heeft nog geen bestellingen</h1>
                    </div>
                    @else
                    <div class="alert alert-succes">
                        <h1>Uw orders</h1>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
