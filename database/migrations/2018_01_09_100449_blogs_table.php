<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('author_id')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->index();
            $table->string('all_pages_main_view')->nullable();
            $table->string('single_pages_main_view')->nullable();
            $table->string('url_manager')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->text('form_settings')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
