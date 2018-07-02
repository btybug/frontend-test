<?php

namespace Btybug\Framework\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCssTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::create('table_css', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 191);
            $table->string('html')->nullable();
            $table->timestamps();
        });
        \DB::table("table_css")->insert([
            [
                "slug"=>"icons"
            ],
            [
                "slug"=>"l_text"
            ],
            [
                "slug"=>"link_text"
            ],
            [
                "slug"=>"m_text"
            ],
            [
                "slug"=>"s_text"
            ],
            [
                "slug"=>"xl_large_text"
            ],
            [
                "slug"=>"xs_text"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::drop("table_css");
    }
}
