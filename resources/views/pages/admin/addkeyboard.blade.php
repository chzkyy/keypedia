@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container card-login mt-5">
    <div class="row justify-content-center">
        <div class="card border-0 form-group">
            <div class="card-header text"><b>Add Keyboard</b></div>

            <div class="card-body border-0">
                <form method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
                    @csrf

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
                           <input id="title" type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Keyboard Price ($)</label>

                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control" name="price">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Keyboard Description</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control" name="description"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 mt-3 col-form-label text-md-end">Keyboard Image</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control mt-3" name="image" multiple accept="image/*">
                        </div>
                    </div>


                    <div class="row mt-3 mb-3">
                        <div class="col-md-1 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              Add
                          </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection