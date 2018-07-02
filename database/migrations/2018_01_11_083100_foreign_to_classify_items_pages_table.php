<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignToClassifyItemsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


          Schema::table('classify_items_pages',function (Blueprint $table) {

              $table->foreign('front_page_id')->references('id')
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
        //
    }
}
