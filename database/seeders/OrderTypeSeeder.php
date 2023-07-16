<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_type')->insert([
            [   'id'=>1,
                'name'=>'Pemindahtanganan'
            ],
            [   'id'=>2,
                'name'=>'Pemusnahan'],
            [   'id'=>3,
                'name'=>'Penghapusan Oleh Sebab Lain']
        ]);
    }
}
