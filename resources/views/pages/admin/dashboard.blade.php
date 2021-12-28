@extends('layouts.admin')

@section('title')
  Home
@endsection

@section('content')
<section class="content  mt-4 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center mt-5">
        <h1>Welcome to Keypedia</h1>
        <p>Best Keyboard and Keycaps Shop</p>
        <h2>Categories</h2>
      </div>
    </div>
    
    <div class="items d-flex">
      @if (count($categories) >= 1)
        @foreach($categories as $category)
          <div class="card mt-5 item">
            <a class="dropdown-item" href="{{ route('category',[$category->id]) }}">
              <div class="card-body">
                <p class="card-title category-title">{{ $category->category }}</p>
              </div>
              <img src="{{ url('img/'.$category->image) }}" class="card-img-bottom" alt="{{ $category->name }}">
            </a>
          </div>
        @endforeach
      @else
        <div class="bg-blue text-center mt-5">
          <h1 class="p-2">Categories Not Found</h1>
        </div>
      @endif
    </div>
    
    <div class="d-flex justify-content-center mt-5">
      {{ $categories->links() }}
    </div>
  </div>
</section>
@endsection