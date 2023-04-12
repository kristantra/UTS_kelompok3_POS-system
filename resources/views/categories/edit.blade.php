@extends('layouts.app')

@section('content')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-bottom: 10px;">
    {{ __('Edit Category') }}
    
</h2>

<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="input_nama" value="{{ $category->name }}" required>
    </div>
    <div class="form-group">
        <label for="name">Deskripsi</label>
        <input type="text" class="form-control" id="name" name="input_description" value="{{ $category->description }}" required>
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: blue; color: white;">Update category</button>
</form>

@endsection
