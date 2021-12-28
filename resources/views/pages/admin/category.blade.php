@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center mt-5">
                    <p class="mt-2 bg-blue p-2">
                        {{ $title }}
                    </p>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>

            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="input-group fsearch mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <div class="input-group fselect">
                        <select class="form-control" name="option">
                            <option value="title">Name</option>
                            <option value="price">Price</option>
                        </select>
                    </div>
                    <button class="btn btn-light" type="submit" id="button">Search</button>
                </div>
            </form>
        
            <div class="items d-flex">
                @if (count($keyboards) >= 1)
                    @foreach ($keyboards as $item)
                        <div class="card mt-5">
                            <a href="{{ route('keyboard',[$item->id]) }}">
                                <img src="{{ url('img/'.$item->image) }}" class="card-img-top" alt="keyboard">
                                <div class="card-body">
                                    <p class="card-title text-black">{{ $item->title }}</p>
                                    <p class="card-subtitle text-white">US$ {{ $item->price }}</p>
                                </div>
                            </a>
                            <div class="footer-card p-1 text-center mb-3">
                                <a href="{{ route('deletekeyboard',[$item->id]) }}">
                                    @method('POST')
                                    <button type="submit" class="btn-primary p-1 justify-content-evenly">
                                        Delete Keyboard
                                    </button>
                                </a>

                                <a href="{{ route('editkeyboard',[$item->id]) }}" class="text-decoration-none text-white">
                                    <button type="submit" class="btn-primary p-1 justify-content-evenly">
                                        Update Keyboard
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach  
                @else
                    <div class="bg-blue text-center mt-5">
                        <h1 class="p-2">Keyboards Not Found</h1>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $page->links() }}
            </div>
        </div>
    </section>
@endsection