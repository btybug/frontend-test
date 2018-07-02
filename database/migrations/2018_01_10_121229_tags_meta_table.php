<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_meta',function (Blueprint $table) {
            $table->increments('meta_id');
            $table->unsignedInteger('tag_id')->index();
            $table->unsignedInteger('post_id')->nullable();
            $table->unsignedInteger('page_id')->nullable();
            $table->string('meta_key');
            $table->longText('meta_value');
            $table->timestamps();

            $table->foreign('tag_id')->references('id')
                ->on('tags')->onDelete('CASCADE');
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
        Schema::dropIfExists('tags_meta');
    }
}
