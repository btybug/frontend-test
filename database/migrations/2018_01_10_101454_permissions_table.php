<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->unsignedInteger('parent')->index()->nullable();
            $table->text('description')->nullable();
            $table->string('type')->default('roles');
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
        Schema::dropIfExists('permissions');
    }
}
