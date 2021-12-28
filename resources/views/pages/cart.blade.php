@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="card w-50">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="card-title details">
                My Cart
            </div>

            @foreach ($cart as $item)
                @if ($loop->last)
                <div class="card-body row">
                    <div class="col-6 col-md-4">
                        <img class="img-fluid" src="{{ url('img/'.$item->product->image) }}" alt="image">
                    </div>
                    
                    <div class="col-md-8 text-start">
                        <h4>{{ $item->product->title }}</h4>
                        <p>Subtotal: ${{ $item->product->price * $item->quantity }}</p>
                        <div class="quantity justify-content-center">
                            <form action="{{ route('cart.update',[$item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="quantity">Quantity</label>
                                <input type="number" class="inputquantity" name="quantity" min="1" id="quantity" value="{{$item->quantity}}">
                                <button type="submit" class="btn-quantity btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="justify-content-center mt-5">
                            <form action="{{ route('checkout') }}">
                                @csrf
                                <input type="hidden" class="inputquantity" name="quantity" id="quantity" min="1" value="{{$item->quantity}}">
                                <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                <button class="btn-quantity btn-primary">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection