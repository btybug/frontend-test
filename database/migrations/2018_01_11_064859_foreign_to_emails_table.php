<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignToEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emails',function (Blueprint $table) {

            $table->foreign('group_id')->references('id')
                ->on('email_groups')->onDelete('CASCADE');

            $table->foreign('form_id')->references('id')
                ->on('forms')->onDelete('CASCADE');

            $table->foreign('variation_id')->references('id')
                ->on('menu_variation')->onDelete('CASCADE');
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
