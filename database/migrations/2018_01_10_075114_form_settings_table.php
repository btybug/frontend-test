<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_settings',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('form_id')->index();
            $table->text('default_settings')->nullable();
            $table->text('additional_settings')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')
                ->on('forms')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_settings');
    }
}
