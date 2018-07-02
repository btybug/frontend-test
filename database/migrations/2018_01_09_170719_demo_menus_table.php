<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DemoMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_menus',function (Blueprint $table){

            $table->increments('id');
            $table->unsignedInteger('creator_id');
            $table->string('name');
            $table->string('module')->nullable();
            $table->string('type')->default('core');
            $table->string('place')->default('backend');
            $table->longText('json_data')->nullable();
            $table->timestamps();

            $table->foreign('creator_id')->references('id')
                ->on('users')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demo_menus');
    }
}
