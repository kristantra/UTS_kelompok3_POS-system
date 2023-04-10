<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $customers = User::all();
        $products = Product::all();
        return view('transactions.index', compact('customers', 'products'));
    }
    public function store(Request $request)
    {
        // Validate the request data

        // Create a new transaction
        $transaction = Transaction::create([
            'user_id' => $request->input('user_id'),
            'total_amount' => $request->input('total_amount'),
            'status' => 'completed',
        ]);

        // Loop through the cart items and create transaction items
        $cart_items = $request->input('cart_items');
        foreach ($cart_items as $item) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction submitted successfully');
    }
}
