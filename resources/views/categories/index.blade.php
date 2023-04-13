@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
        </div>
        
        <div class="col-md-6">
            <form action="{{ route('categories.index') }}" method="get" class="d-inline">
                <div class="input-group">
                    <select class="form-select" name="category_id" onchange="this.form.submit()">
                        <option value="">Select a category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (request('category_id') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            @if (request('category_id'))
                <a href="{{ route('categories.edit', request('category_id')) }}" class="btn btn-warning" style="margin-top: 5px;">Edit</a>
                <form action="{{ route('categories.destroy', request('category_id')) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all related products.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="background-color: red; color: white; margin-top: 5px;">Delete</button>
                </form>
            @endif
        </div>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card h-100" style="width: 18rem;">
                    <img src="{{asset('images/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6>Category: {{ $product->category->name}}</h6>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="mt-auto"><strong>Quantity:  {{ $product->quantity }}</strong></p>
                        <p class="mt-auto"><strong>Price Rp. {{ $product->price }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
