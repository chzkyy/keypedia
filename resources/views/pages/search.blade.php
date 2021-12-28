@extends('layouts.app')

@section('title')
    Search
@endsection

@section('content')
    <section class="content mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center mt-5">
                    <p class="mt-2 bg-blue p-2">
                        @if (request()->get('search'))
                            {{ request()->get('search') }}
                        @endif
                    </p>
                </div>
            </div>

            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="input-group fsearch mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <div class="input-group fselect">
                        <select class="form-control" name="option">
                            <option value="">Name</option>
                            <option value="">Price</option>
                        </select>
                    </div>
                    <button class="btn btn-light" type="submit" id="button">Search</button>
                </div>
            </form>
        
            <div class="items d-flex">
                @if (count($product) >= 1)
                    @foreach ($product as $item)
                        <div class="card mt-5">
                            <a href="{{ route('keyboard',[$item->id]) }}">
                                <img src="{{ url('img/'.$item->image) }}" class="card-img-top" alt="keyboard">
                                <div class="card-body">
                                    <p class="card-title text-black">{{ $item->title }}</p>
                                    <p class="card-subtitle text-white">US$ {{ $item->price }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach  
                @else
                    <div class="bg-blue text-center mt-5">
                        <h1 class="p-2">Keyboards Not Found</h1>
                    </div>
                @endif
            </div>
            
            <div class="d-flex justify-content-center mt-5">
                {{ $product->links() }}
            </div>
        </div>
    </section>
@endsection