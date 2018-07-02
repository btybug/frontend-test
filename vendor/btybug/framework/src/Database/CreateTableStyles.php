<?php

namespace Btybug\Framework\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStyles extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('table_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('table_css_id')->nullable();
            $table->string('classname')->nullable();
            $table->longText('styles')->nullable();
            $table->timestamps();
        });
        Schema::table("table_styles",function(Blueprint $table){
            $table->foreign('table_css_id')->references('id')->on('table_css');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop("table_styles");
    }
}
