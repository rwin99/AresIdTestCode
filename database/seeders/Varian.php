<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Varian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('varian')->insert(
            [
                'name' => 'Coklat',
                'sku' => 'SK001',
                'price' => 250000
            ]
        );
        DB::table('varian')->insert(
            [
                'name' => 'Merah',
                'sku' => 'SK002',
                'price' => 250000
            ]
        );
        DB::table('varian')->insert(
            [
                'name' => 'Kuning',
                'sku' => 'SK003',
                'price' => 250000
            ]
        );
    }
}
