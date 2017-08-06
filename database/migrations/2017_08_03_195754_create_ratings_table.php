<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('stars')->unsigned()->nullable();
            $table->tinyInteger('buyer_recommended')->unsigned()->nullable();
            $table->tinyInteger('seller_recommended')->unsigned()->nullable();
            $table->string('buyer_comments',255)->nullable();
            $table->string('seller_comments',255)->nullable();

            $table->integer('sales_id')->unsigned();

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
        Schema::dropIfExists('ratings');
    }
}
