<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_roles',function (Blueprint $table){
           $table->unsignedInteger('form_id');
           $table->unsignedInteger('role_id');

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
        Schema::dropIfExists('forms_roles');
    }
}
