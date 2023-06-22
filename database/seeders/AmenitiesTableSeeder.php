<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('amenities')->insert([
            
            [
                'amenities_name' => 'RAM',
                'created_at' => Carbon::now(),
            ],

            [
                'amenities_name' => 'Hardisk',
                'created_at' => Carbon::now(),
            ],

            [
                'amenities_name' => 'Casing',
                'created_at' => Carbon::now(),
            ],


        ]);
    }
}
