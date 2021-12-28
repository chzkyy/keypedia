@extends('layouts.app')

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
                    <img class="img-fluid" src="{{ url('img/'.$product->image) }}" alt="image" srcset="">
                </div>
                <div class="col-md-8 text-start">
                    <h4>{{ $product->title }}</h4>
                    <p>${{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                    <div class="text-center w-75">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <label for="quantity">Quantity</label>
                            <input class="w-50" type="number" name="quantity" id="quantity" min="1" required 
                                value="{{ request('quantity') }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="image" value="{{ $product->image }}">
                            <button type="submit" class="btn mr-5 mt-2 btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection