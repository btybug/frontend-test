<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->string('table_name');
            $table->string('column_name');
            $table->string('second_table')->nullable();
            $table->string('second_column')->nullable();
            $table->tinyInteger('required')->default('0');
            $table->tinyInteger('visibility')->default('0');
            $table->tinyInteger('available_for_users')->default('0');
            $table->string('default_value')->nullable();
            $table->string('before_save')->nullable();
            $table->string('label')->nullable();
            $table->string('icon')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('tooltip')->nullable();
            $table->text('help')->nullable();
            $table->string('tooltip_icon')->nullable();
            $table->text('json_data')->nullable();
            $table->string('unit')->nullable();
            $table->string('data_source')->nullable();
            $table->string('type')->nullable();
            $table->string('structured_by');
            $table->unsignedInteger('created_by')->index()->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('extravalidation')->nullable();
            $table->text('validation_message')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
