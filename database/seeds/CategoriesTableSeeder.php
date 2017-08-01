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
        DB::insert($this->categories());

        // DB::table('categories')->insert([
        //     [
        //     'category_name' => 'Lugar',
        //     'created_at' => date('Y-m-d h:i:s'),
        //     'updated_at' => date('Y-m-d h:i:s'),
        //     ],
        // ]);

    }
    private function categories()
    {
        return "INSERT INTO categories (category_name,subcategory_child_of_id,created_at,updated_at)
        VALUES
        /*1*/('Locación',NULL,now(),now()),
        /*2*/('Decoración',NULL,now(),now()),
        /*3*/('Catering',NULL,now(),now()),
        /*4*/('Servicios',NULL,now(),now()),
        /*5*/('Otros',NULL,now(),now()),
        -- subcaregorías...
        ('Salones',1,now(),now()),
        ('Quintas',1,now(),now()),
        ('Otras locaciones',1,now(),now()),
        ('Decoracion y ambientación',2,now(),now()),
        ('Mobiliario',2,now(),now()),
        ('Otros',2,now(),now()),
        ('Catering general',3,now(),now()),
        ('Mesa dulce',3,now(),now()),
        ('Tortas de boda y cumpleaños',3,now(),now()),
        ('DJs y sonido',4,now(),now()),
        ('Foto y video',4,now(),now()),
        ('Animacion y shows',4,now(),now()),
        ('Cotillon',5,now(),now()),
        ('Vestidos y trajes a medida',5,now(),now()),
        ('Ramos y souvenirs',5,now(),now())
        ;";

}
}

