<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('admin_pages', function (Blueprint $table) {


            $table->increments('id');
            $table->unsignedInteger('module_id');
            $table->string('title');
            $table->string('url');
            $table->string('permission');
            $table->string('redirect_to');
            $table->string('slug');
            $table->string('layout_id')->nullable();
            $table->tinyInteger('content_type');
            $table->text('main_content');
            $table->string('header');
            $table->tinyInteger('footer');
            $table->string('page_icon');
            $table->string('child_status');
            $table->unsignedInteger('parent_id');
            $table->tinyInteger('is_default');
            $table->text('settings');

            $table->timestamps();
            $table->foreign('parent_id')->references('id')
                ->on('admin_pages')->onDelete('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_pages');
    }
}
