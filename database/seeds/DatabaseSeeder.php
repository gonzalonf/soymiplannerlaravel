<?php

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

        // Data nuestra
        $this->call(CategoriesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);

        // Dummy data
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
