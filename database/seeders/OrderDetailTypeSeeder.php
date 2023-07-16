<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_detail_type')->insert([
            [   'id'=>1,
                'name'=>'Permohonan Pemindahtanganan BMD',
                'description'=>'Upload Dokumen Permohonan Pemindahtanganan BMD'
            ],
            [   'id'=>2,
                'name'=>'SK Tim Peneliti Lingkup Perangkat Daerah',
                'description'=>'Upload Dokument SK Tim Peneliti Lingkup Perangkat Daerah'],
            [   'id'=>3,
                'name'=>'Berita Acara Penelitian Pemindahtanganan',
                'description'=>'Upload Dokumen Berita Acara Penelitian Pemindahtanganan'],
            [   'id'=>4,
                'name'=>'Surat Pernyataan Kepemilikan BMD',
                'description'=>'Upload Dokumen Surat Pernyataan Kepemilikan BMD'],
            [   'id'=>5,
                'name'=>'Lampiran Lain',
                'description'=>'Upload Dokumen Lampiran Lain'],
            [   'id'=>6,
                'name'=>'KIB A',
                'description'=>'Upload Dokumen KIB A'],
            [   'id'=>7,
                'name'=>'KIB B',
                'description'=>'Upload Dokumen KIB B'],
            [   'id'=>8,
                'name'=>'KIB C',
                'description'=>'Upload Dokumen KIB C'],
            [   'id'=>9,
                'name'=>'KIB D',
                'description'=>'Upload Dokumen KIB D'],
            [   'id'=>10,
                'name'=>'KIB E',
                'description'=>'Upload Dokumen KIB E'],
        ]);
    }
}
