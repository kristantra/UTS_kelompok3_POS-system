@extends('layouts.app')

@section('content')
<div class="card full-height">
    <div class="card-header">
        <div class="text-center">
            <h1>Cart </h1> 
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-3">
        <!-- Product selection -->
        <div class="col-md-4">
            <select class="custom-select" id="inputProduct" onchange="updateProductId(this.value)">
                <option selected>product name<option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div class="col-md-2">
            <p>Available Quantity: <span id="availableQuantity"></span></p>
            <input type="number" class="form-control" id="inputQuantity" onchange="updateQuantity(this.value)" min="1" placeholder="0">
        </div>

        <!-- Add to cart button -->
        <div class="col-md-2">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="hiddenProductId" value="">
                <input type="hidden" name="quantity" id="hiddenQuantity" value="">
                <button type="submit" class="btn btn-danger">Add to cart</button>
            </form>
        </div>
    </div>

    <!-- Cart table -->
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>${{ $cart->product->price * $cart->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Total and action buttons -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Total: Rp<span id="totalAmount">{{ $carts->sum(function ($cart) {
                return $cart->product->price * $cart->quantity;
            }) }}</span></h3>
        </div>
    </div>

    <div class="row">
        <!-- Cancel button -->
        <div class="col-md-6">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel</button>
            </form>
        </div>

        <!-- Submit button -->
        <div class="col-md-6">
            <form action="{{ route('cart.submit') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    <script>
        const products = @json($products);
    
        function updateProductId(value) {
            document.getElementById('hiddenProductId').value = value;
            displayProductQuantity(value);
        }
    
        function displayProductQuantity(productId) {
            const product = products.find(p => p.id == productId);
            const quantityDisplay = document.getElementById('availableQuantity');
            if (product) {
                quantityDisplay.innerText = product.quantity;
            } else {
                quantityDisplay.innerText = '';
            }
        }
    
        function updateQuantity(value) {
            const productId = document.getElementById('hiddenProductId').value;
            const product = products.find(p => p.id == productId);
            if (product && value > product.quantity) {
                alert('The requested quantity is greater than the available stock.');
                document.getElementById('inputQuantity').value = '';
                return;
            }
            document.getElementById('hiddenQuantity').value = value;
        }
    
        // Initialize the available quantity display for the initially selected product
        displayProductQuantity(document.getElementById('inputProduct').value);
    </script>
    
@endsection
