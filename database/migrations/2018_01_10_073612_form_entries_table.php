<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_entries',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('form_id');
           $table->unsignedInteger('user_id')->nullable();
           $table->string('ip')->nullable();
           $table->longText('data')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('form_id')->references('id')
                ->on('forms')->onDelete('CASCADE');
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
        Schema::dropIfExists('form_entries');
    }
}
