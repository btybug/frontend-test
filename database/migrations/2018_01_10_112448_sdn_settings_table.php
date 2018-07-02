<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SdnSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdn_settings',function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('zip')->default('0');
            $table->tinyInteger('download')->default('0');
            $table->string('small_size');
            $table->string('medium_size');
            $table->string('large_size');
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
        Schema::dropIfExists('sdn_settings');
    }
}
