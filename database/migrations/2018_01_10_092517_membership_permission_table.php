<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembershipPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_permission',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->unsignedInteger('membership_id');
            $table->timestamps();

            $table->foreign('membership_id')->references('id')
                ->on('memberships')->onDelete('CASCADE');

            $table->foreign('page_id')->references('id')
                ->on('core_pages')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_permission');
    }
}
