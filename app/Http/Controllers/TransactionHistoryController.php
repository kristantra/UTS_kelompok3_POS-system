<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('transactionItems.product')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('transactionhistories.index', compact('transactions'));
    }
}
