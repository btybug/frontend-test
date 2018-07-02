<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media',function (Blueprint $table){

            $table->increments('id');
            $table->unsignedInteger('folder_id');
            $table->unsignedInteger('user_id');
            $table->string('media_type');
            $table->string('title');
            $table->integer('active_variation');
            $table->string('ext');
            $table->string('name');
            $table->string('alt_tags');
            $table->string('keywords');
            $table->string('caption');
            $table->text('description');
            $table->text('alt_text');
            $table->string('status')->default('admin');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('CASCADE');

            $table->foreign('folder_id')->references('id')
                ->on('drive_folders')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
