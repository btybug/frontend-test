<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('parent_id')->index()->nullable();
            $table->longText('comment');
            $table->string('status')->default('Unapproved');
            $table->unsignedInteger('author_id')->index()->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_url')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')
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
        Schema::dropIfExists('comments');
    }
}
