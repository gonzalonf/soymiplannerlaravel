<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
            'name' => 'Quinta "Delta Parana"',
            'description'=> 'Quinta con hermosa arboleda.Capacidad entre 50 y 250 invitados.En el jardín se pueden celebrar ceremonias civiles o religiosas.La laguna es ideal para altares rodeados de cañas de bambú.',
            'price'=> 'Desde $20.000',
            'user_seller_id'=>4,
            'category_id'=>1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Salon "Fiesta Inolvidable"',
            'description'=> 'Ofrecemos un espacio diseñado para la realización de eventos sociales y empresariales, con una alta calidad en sus servicios y atención al cliente.',
            'price'=> 'Desde $18.000',
            'user_seller_id'=>9,
            'category_id'=>1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Foto y Video "José"',
            'description'=> 'Empresa con mas de 10 Años en el mercado ofreciendo Fotografía, Video y Gráficas para eventos.',
            'price'=> 'A convenir',
            'user_seller_id'=>5,
            'category_id'=>4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Catering "Asian Delight"',
            'description'=> 'Somos una cadena de sushi y wraps y les ofrecemos el servicio de catering para cualquier tipo de evento. Una opción sana, rica y muy económica, puede incluir la preparación en vivo!',
            'price'=> 'Desde $18.000',
            'user_seller_id'=>2,
            'category_id'=>3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Catering "Sabores Criollos"',
            'description'=> 'Realizamos catering para todo tipo de eventos, tanto sociales como corporativos. Cubrimos todas sus necesidades, con menúes personalizados y soluciones integrales para cada evento.',
            'price'=> 'A convenir',
            'user_seller_id'=>11,
            'category_id'=>3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Cotillon "Los Piratas"',
            'description'=> 'Fabricación de cotillón temático artesanal. Desde hace más de 20 años hacemos de las fiestas un evento exclusivo y diferente, con un estilo único y personal. ',
            'price'=> 'A convenir',
            'user_seller_id'=>6,
            'category_id'=>5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'DJ "Manija"',
            'description'=> 'Discjockey, música y sonido para todo tipo de eventos.',
            'price'=> 'A convenir',
            'user_seller_id'=>1,
            'category_id'=>4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Cotillon "Carnaval toda al vida"',
            'description'=> 'Cotillón y accesorios para que tu fiesta sea la más original y divertida.',
            'price'=> 'A convenir',
            'user_seller_id'=>7,
            'category_id'=>5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Banda "Los Cachengues"',
            'description'=> 'Banda de Covers para Eventos. Cumbia Retro, Carnaval Carioca, Cumbia Pop, Bailable Retro. 6 años de experiencia. Músicos profesionales.',
            'price'=> 'Desde $3.000',
            'user_seller_id'=>8,
            'category_id'=>4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Mobiliario para eventos "Silla&Sillon"',
            'description'=> 'Somos una empresa familiar dedicada al alquiler de mesas, sillas y sillones para eventos.',
            'price'=> 'A convenir',
            'user_seller_id'=>3,
            'category_id'=>2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
            'name' => 'Tortas de Boda "Ensueño"',
            'description'=> 'Ofrecemos servicios de y pastelería cuidando siempre cada detalle y utilizando las mejores materias primas.',
            'price'=> 'Desde $1.000',
            'user_seller_id'=>11,
            'category_id'=>3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ],

            [
            'name' => 'Iluminacion "Que flash!"',
            'description'=>'Imagen e iluminación, proyecciones, luminarias leds, ambientación, efectos ópticos, iluminación robotizada, cabezales móviles, scanners, laser shows, máquinas de humo, efectos y más.',
            'price'=> 'A convenir',
            'user_seller_id'=>1,
            'category_id'=>2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            ]
    ]);
    }


}
