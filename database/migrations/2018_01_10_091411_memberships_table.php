<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships',function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->enum('special',['all-access', 'no-access'])->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
