<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('id')->index()->nullable();
            $table->string('username')->index()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('membership_id')->default('0');
            $table->unsignedInteger('role_id');
            $table->string('status')->default('active');
            $table->text('token')->nullable();

            $table->rememberToken();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
