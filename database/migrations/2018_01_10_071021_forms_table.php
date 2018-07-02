<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms',function (Blueprint $table){
           $table->increments('id');
           $table->string('name');
           $table->string('slug')->index();
           $table->string('default_field')->nullable();
           $table->longText('settings')->nullable();
           $table->tinyInteger('blocked')->default('0');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string('type')->default('new');
            $table->tinyInteger('form_access')->default('0');
            $table->string('created_by')->default('core');
            $table->text('fields_json')->nullable();
            $table->string('fields_type')->nullable();
            $table->text('required_fields')->nullable();
            $table->string('form_layout')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
