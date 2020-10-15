<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'          => 'Apple',
                'quantity'      => 50,
                'unit_price'    => '250',
                'status'        => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Orange',
                'quantity'      => 50,
                'unit_price'    => '250',
                'status'        => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Mango',
                'quantity'      => 50,
                'unit_price'    => '250',
                'status'        => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Lychee',
                'quantity'      => 500,
                'unit_price'    => '250',
                'status'        => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ]);
    }
}
