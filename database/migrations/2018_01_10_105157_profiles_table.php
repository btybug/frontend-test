<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id')->index();
            $table->integer('is_default')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('profiles');
    }
}
