<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
            'id' => 1,
            'category_name' => 'Locación',
            'subcategory_child_of_id' => NULL,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => 2,
            'category_name' => 'Decoración',
            'subcategory_child_of_id' => NULL,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => 3,
            'category_name' => 'Catering',
            'subcategory_child_of_id' => NULL,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => 4,
            'category_name' => 'Servicios',
            'subcategory_child_of_id' => NULL,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => 5,
            'category_name' => 'Otros',
            'subcategory_child_of_id' => NULL,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Salones',
            'subcategory_child_of_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Quintas',
            'subcategory_child_of_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Otras locaciones',
            'subcategory_child_of_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Decoración y ambientación',
            'subcategory_child_of_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Mobiliario',
            'subcategory_child_of_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Otros',
            'subcategory_child_of_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Catering general',
            'subcategory_child_of_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Mesa dulce',
            'subcategory_child_of_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Tortas de boda y cumpleaños',
            'subcategory_child_of_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'DJs y sonido',
            'subcategory_child_of_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Foto y video',
            'subcategory_child_of_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Animación y shows',
            'subcategory_child_of_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Cotillón',
            'subcategory_child_of_id' => 5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Vestidos y trajes',
            'subcategory_child_of_id' => 5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'id' => NULL,
            'category_name' => 'Ramos y souvenirs',
            'subcategory_child_of_id' => 5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ]
        ]);
    }
}