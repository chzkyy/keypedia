@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="card w-50">

            <div class="card-title details">
                {{ $title }}
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('edit',[$category->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-6 col-md-4">
                        <img class="img-thumbnail" src="{{ url('img/'.$category->image) }}" alt="{{ $category->image }}">
                    </div>
                    <div class="col-md-8 text-start">
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">Category Name</label>
    
                            <div class="col-md-6">
                               <input id="category" type="text" class="form-control" value="{{ $category->category }}" name="category">
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Category Image</label>
    
                            <div class="col-md-6">
                                <input id="image" type="file" class="mt-2" name="image" multiple accept="image/*">
                            </div>
                        </div>

                        <div class="justify-content-center text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>    
                </div>
            </form>

        </div>
    </div>
</div>
@endsection