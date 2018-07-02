<?php

namespace Btybug\User\Http\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::table('users',function(Blueprint $table){
            $table->string("website")->nullable();
            $table->longText("about")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {

    }
}
