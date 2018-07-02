<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('group_id')->index();
           $table->unsignedInteger('form_id');
           $table-> enum('emails',['admin', 'user'])->nullable();
           $table->integer('custom_days');
           $table->string('name');
           $table->string('form_id_type')->nullable();
           $table->string('from_');
           $table->string('when_');
           $table->string('custom_time');
           $table->string('event_code');
           $table->string('trigger_on_form')->default('0');
           $table->string('to_');
           $table->string('cc');
           $table->string('bcc');
           $table->string('replyto');
           $table->text('attachment');
           $table->text('notify_to');
           $table->integer('priority');
           $table->string('content_type');
           $table->integer('template_id');
           $table->unsignedInteger('variation_id');
           $table->string('subject')->nullable();
           $table->text('content')->nullable();
           $table->text('settings')->nullable();
           $table->tinyInteger('is_public')->default('0');
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
        Schema::dropIfExists('emails');
    }
}
