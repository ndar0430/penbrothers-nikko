<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flavor_id');
            $table->bigInteger('topping_area_1_id')->unsigned()->nullable();
            $table->bigInteger('topping_area_2_id')->unsigned()->nullable();
            $table->bigInteger('topping_area_3_id')->unsigned()->nullable();
            
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
        Schema::dropIfExists('pizza_types');
    }
}
