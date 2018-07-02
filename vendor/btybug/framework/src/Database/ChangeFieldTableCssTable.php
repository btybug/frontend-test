<?php

namespace Btybug\Framework\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldTableCssTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::table('table_css', function (Blueprint $table) {
            $table->longText('html')->nullable()->change();
        });
    }
}
