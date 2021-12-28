@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="card w-50">
            <div class="card-title details">
                Detail Keyboard
            </div>
            <div class="card-body row">
                <div class="col-6 col-md-4">
                    <img class="img-fluid" src="{{ url('img/'.$product->image) }}" alt="image">
                </div>
                <div class="col-md-8 text-start">
                    <h4>{{ $product->title }}</h4>
                    <p>${{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection