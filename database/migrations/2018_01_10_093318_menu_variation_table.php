<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_variation',function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('class');
            $table->unsignedInteger('user_role');
            $table->unsignedInteger('menus_id');
            $table->tinyInteger('is_core');
            $table->tinyInteger('is_active');
            $table->timestamps();

            $table->foreign('menus_id')->references('id')
                ->on('demo_menus')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_variation');
    }
}
