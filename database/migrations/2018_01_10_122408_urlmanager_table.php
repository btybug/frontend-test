<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrlmanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlmanager',function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('page_id')->nullable();
            $table->unsignedInteger('front_page_id')->nullable();
            $table->string('type');
            $table->string('url');
            $table->unsignedInteger('parent_id')->default('0');
            $table->timestamps();

            $table->foreign('front_page_id')->references('id')
                ->on('frontend_pages')->onDelete('CASCADE');

            $table->foreign('page_id')->references('id')
                ->on('admin_pages')->onDelete('CASCADE');
            $table->foreign('parent_id')->references('id')
                ->on('urlmanager')->onDelete('CASCADE');








        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urlmanager');
    }
}
