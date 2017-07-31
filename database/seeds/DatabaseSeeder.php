truncate<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // deshabilita chequeo foreign keys

        DB::table('users')->truncate();
        DB::table('users')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'home' => 'homeSweetHome',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            'category_name' => 'Juguetes',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('products')->truncate();
        DB::table('products')->insert([
            'name' => 'Cotillón',
            'description'=> 'el mejor cotillón',
            'price'=> '500',
            'user_seller_id'=>1,
            'category_id'=>1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('locations')->truncate();
        DB::table('locations')->insert([
        [
            'location' => 'Capital',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'GBA Norte',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'GBA Sur',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'GBA Oeste',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'Córdoba',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'Rosario',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ],
        [
            'location' => 'La Plata',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
