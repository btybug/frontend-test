<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_fields',function (Blueprint $table){
           $table->unsignedInteger('form_id');
           $table->string('field_slug');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();


            $table->foreign('form_id')->references('id')
                ->on('forms')->onDelete('CASCADE');
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

        Schema::dropIfExists('form_fields');
    }
}
