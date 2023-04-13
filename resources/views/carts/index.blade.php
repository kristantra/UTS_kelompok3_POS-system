@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <!-- Product selection -->
        <div class="col-md-4">
            <select class="custom-select" id="inputProduct" onchange="updateProductId(this.value)">
                <option selected>Product Name<option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Avaliabel Quantity --}}
        <div class="col-md-2">
            <div class="border p-2" style="border-radius: 5px; background-color: white;"> <!-- menambahkan border dan padding -->
                {{-- <label for="availableQuantity">Available Quantity</label> --}}
                <span id="availableQuantity"></span>
              </div>
        </div>

        <!-- Quantity -->
        <div class="col-md-2">
            <input type="number" class="form-control" id="inputQuantity" onchange="updateQuantity(this.value)" min="1" placeholder="Quantity" name="Quantity" style="border-radius: 5px; padding-left: 10px;">
        </div>

        <!-- Add to cart button -->
        <div class="col-md-2">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="hiddenProductId" value="">
                <input type="hidden" name="quantity" id="hiddenQuantity" value="">
                <button type="submit" class="btn btn-success" style="color: black;">Add to cart</button>
            </form>
        </div>
    </div>

    <!-- Cart table -->
    <div class="row">
        <div class="col-md-11">
            <table class="table table-striped" >
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
                            <td>Rp.{{ $cart->product->price * $cart->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Total and action buttons -->
    <div class="row mb-3">
        <div class="col-md-11 ">
            <h3 style="margin-left: 7px;">Total :<span id="totalAmount" style="margin-left: 62%; ">Rp.{{ $carts->sum(function ($cart) {
                return $cart->product->price * $cart->quantity;
            }) }}</span></h3>
        </div>
    </div>

    <div class="row" >
        <!-- Cancel button -->
        <div class="col-md-7" style="margin-left: 6px;">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="color: black;">Cancel</button>
            </form>
        </div>

        <!-- Submit button -->
        <div class="col-md-3" style="margin-left: 12px;">
            <form action="{{ route('cart.submit') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" style="color: black;">Submit</button>
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
                quantityDisplay.innerText = 'Avaliable Quanity';
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
