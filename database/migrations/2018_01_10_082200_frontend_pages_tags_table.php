<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FrontendPagesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_pages_tags',function (Blueprint $table){

            $table->increments('id');
            $table->unsignedInteger('frontend_page_id')->index();
            $table->unsignedInteger('tags_id')->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('frontend_page_id')->references('id')
                ->on('frontend_pages')->onDelete('CASCADE');

            $table->foreign('tags_id')->references('id')
                ->on('frontend_pages')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_pages_tags');
    }
}
