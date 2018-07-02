<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassifyItemsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classify_items_pages',function (Blueprint $table){
            $table->increments('front_page_id');
            $table->unsignedInteger('classifier_id')->index();
            $table->unsignedInteger('classifier_item_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('classifier_id')->references('id')
                ->on('classifiers')->onDelete('CASCADE');
            $table->foreign('classifier_item_id')->references('id')
                ->on('classifier_items')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classify_items_pages');
    }
}
