<?php

namespace Btybug\User\Http\Database;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public static function up ()
    {
        Schema::table('users',function(Blueprint $table){
            $table->string("lat")->nullable();
            $table->string("lng")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {

    }
}
