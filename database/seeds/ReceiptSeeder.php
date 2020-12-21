<?php

use Illuminate\Database\Seeder;
use App\Receipt;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Receipt::class, 500)->create();
    }
}
