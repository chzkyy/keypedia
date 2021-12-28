@extends('layouts.admin')

@section('title')
  Home
@endsection

@section('content')
<section class="content mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center mt-4">
        <h1>Manage Category</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
      </div>
    </div>

    <div class="items d-flex">
      @if (count($categories) >= 1)
        @foreach($categories as $category)
          <div class="card mt-5 item">
              <div class="card-body">
                <img src="{{ url('img/'.$category->image) }}" class="card-img-top" alt="{{ $category->category }}">
                <p class="card-title category-title">{{ $category->category }}</p>
              </div>
              <div class="footer-card p-1 text-center mt-3 mb-3">
                <a href="{{ route('deletecategory',[$category->id]) }}" class="text-decoration-none text-white">
                    @method('POST')
                    <button type="submit" class="btn-primary p-1 justify-content-evenly">
                        Delete Categories
                    </button>
                </a>
                <a href="{{ route('editCategory',[$category->id]) }}">
                    <button type="submit" class="btn-primary p-1 justify-content-evenly">
                        Update Categories
                    </button>
                </a>
            </div>
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