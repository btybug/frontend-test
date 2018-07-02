<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagesettings',function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('footer')->default('0');
            $table->tinyInteger('header')->default('0');
            $table->string('body')->nullable();
            $table->integer('layout');
            $table->string('page');
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
        Schema::dropIfExists('pagesettings');
    }
}
