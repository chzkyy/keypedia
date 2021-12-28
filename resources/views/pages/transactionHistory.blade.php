@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="text-center mt-5 mb-5">
                <h1>Your Transaction History</h1>
            </div>

            @foreach ($transactions as $item)
                <div class="text-center">
                    <div class="bg-transaction mb-4">
                        <a href="{{ route('historydetail', $item->id) }}">
                            Transaction at {{ $item->created_at }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection