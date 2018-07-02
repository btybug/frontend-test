<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default('0');
            $table->string('title');
            $table->string('slug');
            $table->string('status');
            $table->string('folder_name');
            $table->string('version');
            $table->string('author');
            $table->string('author_site');
            $table->enum('type',['core', 'custom'])->default('core');
            $table->tinyInteger('is_deleteable')->default('1');
            $table->text('description');
            $table->text('plugin_data');
            $table->tinyInteger('have_setting');
            $table->longText('setting_contents');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')
                ->on('modules')->onDelete('CASCADE');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
