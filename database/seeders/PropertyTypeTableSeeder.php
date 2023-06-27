<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Db;
use Carbon\Carbon;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_types')->insert([
            
            [
                'type_name' => 'Komputer',
                'icon_name' => 'icon-1',
                'created_at' => Carbon::now(),
            ],

            [
                'type_name' => 'Alat Tulis',
                'icon_name' => 'icon-2',
                'created_at' => Carbon::now(),
            ],

            [
                'type_name' => 'Sarana',
                'icon_name' => 'icon-3',
                'created_at' => Carbon::now(),
            ],

            [
                'type_name' => 'Prasarana',
                'icon_name' => 'icon-4',
                'created_at' => Carbon::now(),
            ],

            [
                'type_name' => 'Buku',
                'icon_name' => 'icon-5',
                'created_at' => Carbon::now(),
            ],

            [
                'type_name' => 'Accessoris',
                'icon_name' => 'icon-6',
                'created_at' => Carbon::now(),
            ],

            
            [
                'type_name' => 'Bahan',
                'icon_name' => 'icon-7',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
