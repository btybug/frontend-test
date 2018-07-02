<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_meta',function (Blueprint $table){
           $table->increments('meta_id');
           $table->unsignedInteger('comment_id');
           $table->unsignedInteger('post_id')->nullable();
           $table->unsignedInteger('page_id')->nullable();
           $table->string('meta_key');
           $table->longText('meta_value');
           $table->timestamps();

            $table->foreign('comment_id')->references('id')
                ->on('comments')->onDelete('CASCADE');






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_meta');
    }
}
