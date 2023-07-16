<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_status')->insert([
            [   'id'=>1,
                'name'=>'Belum Upload Dokumen'
            ],
            [   'id'=>2,
                'name'=>'Verifikasi internal SKPD'],
            [   'id'=>3,
                'name'=>'Dokumen Tidak Sesuai']
        ]);
 
    }
}
