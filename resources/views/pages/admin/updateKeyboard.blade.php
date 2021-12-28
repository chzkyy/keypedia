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
            <form action="{{ route('updatekeyboard',[$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-6 col-md-4">
                        <img class="img-thumbnail" src="{{ url('img/'.$product->image) }}" alt="{{ $product->image }}">
                    </div>

                    <div class="col-md-8 text-start">
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Category</label>
    
                            <div class="col-md-6">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Keyboard Name</label>
    
                            <div class="col-md-6">
                               <input id="title" type="text" class="form-control" name="title" value="{{ $product->title }}">
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Keyboard Price ($)</label>
    
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" value="{{ $product->price }}" name="price">
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Keyboard Description</label>
    
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                            </div>
                        </div>
    
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 mt-3 col-form-label text-md-end">Keyboard Image</label>
    
                            <div class="col-md-6">
                                <input id="image" type="file" class="mt-4" name="image" multiple accept="image/*">
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