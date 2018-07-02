<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){
            $table->increments('id');
            $table->text('abo');
            $table->unsignedInteger('author_id')->index();
            $table->string('title')->nullable();
            $table->string('testing')->nullable();
            $table->string('description')->nullable();
            $table->string('shortikrrrr')->nullable();
            $table->text('image')->nullable();
            $table->string('slug')->index()->nullable();
            $table->string('url')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('author_id')->references('id')
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
        Schema::dropIfExists('posts');
    }
}
