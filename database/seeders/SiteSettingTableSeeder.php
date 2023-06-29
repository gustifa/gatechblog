<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Db;
use Carbon\Carbon;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            
            [
                // 'logo' => 'upload/logo/no_image.jpg',
                'logo' => fake()->imageUrl('60','60'),
                'support_phone' => '085274817886',
                'company_address' => 'Pasaman Barat',
                'email' => 'email',
                'facebook' => 'facebook',
                'twitter' => 'twitter',
                'copyright' => 'copyright',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
