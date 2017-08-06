<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name',45);
            // (igual no debería cambiar nombre)
            $table->string('item_description',255);
            $table->string('price',45);
            $table->integer('product_id')->unsigned();
            $table->integer('user_buyer_id')->unsigned();
            $table->integer('user_seller_id')->unsigned();
            $table->dateTime('event_date');

            $table->tinyInteger('buyer_concreted')->unsigned()->dafault(0);
            $table->tinyInteger('seller_concreted')->unsigned()->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
