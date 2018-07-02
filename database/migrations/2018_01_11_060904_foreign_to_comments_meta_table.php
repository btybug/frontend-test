<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignToCommentsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments_meta',function (Blueprint $table){

            $table->foreign('post_id')->references('id')
                ->on('posts')->onDelete('CASCADE');


            $table->foreign('page_id')->references('front_page_id')
                ->on('classify_items_pages')->onDelete('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
