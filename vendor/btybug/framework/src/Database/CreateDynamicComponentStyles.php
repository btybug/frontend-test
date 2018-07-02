<?php

namespace Btybug\Framework\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicComponentStyles extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('dynamic_component_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('table_dynamic_component_id')->nullable();
            $table->string('classname')->nullable();
            $table->longText('styles')->nullable();
            $table->timestamps();
        });
        Schema::table("dynamic_component_styles",function(Blueprint $table){
            $table->foreign('table_dynamic_component_id')->references('id')->on('dynamic_component_css');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop("dynamic_component_styles");
    }
}
