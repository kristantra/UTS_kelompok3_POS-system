<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        $products = Product::all();
        return view('carts.index', compact('carts', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity < $request->quantity) {
            return back()->with('error', 'The requested quantity is greater than the available stock.');
        }

        $cart = Cart::firstOrNew(['product_id' => $request->product_id]);
        $cart->quantity = ($cart->quantity ?: 0) + $request->quantity;
        $cart->save();
        $product->quantity -= $request->quantity;
        $product->save();

        return back()->with('success', 'Item added to cart.');
    }

    public function clear()
    {
        $carts = Cart::all();
        foreach ($carts as $cart) {
            $product = $cart->product;
            $product->quantity += $cart->quantity;
            $product->save();
        }
        Cart::truncate();
        return back()->with('success', 'Cart cleared.');
    }

    public function submit()
    {
        $carts = Cart::all();

        $transaction = new Transaction([
            'total_amount' => $carts->sum(function ($cart) {
                return $cart->product->price * $cart->quantity;
            }),
            'status' => 'completed',
        ]);

        $transaction->save();

        foreach ($carts as $cart) {
            $transactionItem = new TransactionItem([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);

            $transactionItem->save();

            $product = $cart->product;
        }

        Cart::truncate();
        return back()->with('success', 'Transaction submitted.');
    }
}
