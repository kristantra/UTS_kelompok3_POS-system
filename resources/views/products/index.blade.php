@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
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
                    <p class="mt-auto"><strong>Price: Rp. {{ $product->price }}</strong></p>
                    <div class="mt-auto">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="background-color: red; color: white;">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
