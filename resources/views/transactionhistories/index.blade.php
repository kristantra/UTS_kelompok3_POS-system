@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction History</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product List</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>
                            @foreach($transaction->transactionItems as $item)
                                {{ $item->product->name }} ({{ $item->quantity }})<br>
                            @endforeach
                        </td>
                        <td>${{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
