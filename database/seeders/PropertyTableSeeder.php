<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Support\Strtoint;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->truncate();
        $properties = [];
        $awal = 0;
        $akhir = 20;
        
        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 4, 'prefix' => 'PC']);
        for ($i=$awal; $i < $akhir; $i++) { 
           $properties[] = [
            'ptype_id' => rand(1, 5),
            'amenities_id' => rand(1, 5),
            'property_name' => "Lorem ipsum dolor sit {$i}",
            'property_slug' => strtolower(str_replace(' ', '-','Lorem ipsum dolor sit' )),
            'property_code' => '1',
            'property_status' => 'buy',
            // 'agent_id' => '1',
            'lowest_price' => rand(5000000, 60000000),
            'max_price' => rand(5000000, 60000000),
            'short_descp' => "Lorem ipsum dolor sit {$i}",
            'long_descp' => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quae accusantium, quas iste maxime excepturi eius iure. Aliquam soluta sequi vero magni recusandae nobis atque, quos assumenda dignissimos architecto pariatur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam excepturi assumenda consequuntur. Ad, beatae sapiente suscipit sit a, totam rerum, culpa dicta odio delectus laudantium labore ratione officia voluptatum aut! {$i}", 
            'hot' => rand(0, 1),
            'featured' => rand(0, 1),
            'status' => rand(0, 1),
            'created_at' => Carbon::now(),
           ];
        }
        DB::table('properties')->insert($properties);
       
    }
}
