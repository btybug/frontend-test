<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assests',function (Blueprint $table){
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('theme_id');
            $table->string('title');
            $table->string('section');
            $table->string('folder');
            $table->tinyInteger('status');
            $table->text('description');
            $table->text('site_link');
            $table->longText('snippets');
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
        Schema::dropIfExists('assests');
    }
}
