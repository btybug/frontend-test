<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudioPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studio_packages',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id');
            $table->string('title');
            $table->string('author');
            $table->tinyInteger('status');
            $table->string('slug');
            $table->text('description');
            $table->text('image');
            $table->string('tag')->nullable();
            $table->timestamps();

            $table->foreign('group_id')->references('id')
                ->on('studio_groups')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studio_packages');
    }
}
