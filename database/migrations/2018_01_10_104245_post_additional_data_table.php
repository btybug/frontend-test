<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostAdditionalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_additional_data',function (Blueprint $table){

                $table->increments('data_id');
                $table->unsignedInteger('post_id')->index();
                $table->string('key');
                $table->text('value');
                $table->timestamps();

            $table->foreign('post_id')->references('id')
                ->on('posts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_additional_data');
    }
}
