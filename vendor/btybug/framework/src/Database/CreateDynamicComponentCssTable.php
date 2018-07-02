<?php

namespace Btybug\Framework\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicComponentCssTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('dynamic_component_css', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 191);
            $table->longText('html')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop("dynamic_component_css");
    }
}
