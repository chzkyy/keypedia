@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="text-center mt-5 mb-5">
                <h1>Your Transaction at {{ $crateat }}</h1>
            </div>
            @foreach ($transactions as $item)
                <table class="table border-top border-dark border-3">
                    <thead>
                    <tr>
                        <th>Keyboard Image</th>
                        <th>Keyboard Name</th>
                        <th>Subtotal</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img class="img-detail" src="{{ url('img/'.$item->product->image) }}" alt="{{ $item->product->image }}">
                        </td>
                        <td class="h5">{{ $item->product->title }}</td>
                        <td class="h5">{{  $item->product->price * $item->quantity }}</td>
                        <td class="h5">{{  $item->quantity }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-end">
                    <p class="h4">Total Price: {{  $item->product->price * $item->quantity }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
