<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'total_amount' => 28000000,
            'status' => 'completed',
        ]);

        Transaction::create([
            'total_amount' => 10500000,
            'status' => 'completed',
        ]);
        Transaction::create([
            'total_amount' => 15000000,
            'status' => 'completed',
            'created_at' => Carbon::create(2022, 6, 15),
        ]);

        Transaction::create([
            'total_amount' => 20000000,
            'status' => 'completed',
            'created_at' => Carbon::create(2022, 6, 16),
        ]);
    }
}
