<?php

namespace Database\Seeders;

use App\Models\TransactionItem;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionItem::create([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 10500000,
        ]);

        TransactionItem::create([
            'transaction_id' => 1,
            'product_id' => 2,
            'quantity' => 2,
            'price' => 8500000,
        ]);

        TransactionItem::create([
            'transaction_id' => 2,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 10500000,
        ]);
        TransactionItem::create([
            'transaction_id' => 3,
            'product_id' => 3,
            'quantity' => 1,
            'price' => 5000000,
            'created_at' => Carbon::create(2022, 6, 15),
        ]);

        TransactionItem::create([
            'transaction_id' => 4,
            'product_id' => 4,
            'quantity' => 1,
            'price' => 10000000,
            'created_at' => Carbon::create(2022, 6, 16),
        ]);
    }
}
