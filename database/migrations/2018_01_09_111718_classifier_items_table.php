<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassifierItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifier_items',function (Blueprint $table){

            $table->increments('id');
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('classifier_id')->index();
//            $table->engine = "InnoDB";

            $table->timestamps();
//
            $table->foreign('classifier_id')->references('id')->on('classifiers')->onDelete('CASCADE');
            $table->foreign('parent_id')->references('id')->on('classifier_items')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classifier_items');
    }
}
