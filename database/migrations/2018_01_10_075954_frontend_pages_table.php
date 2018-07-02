<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FrontendPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_pages',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('module_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('url');
            $table->string('status')->default('draft');
            $table->tinyInteger('page_access')->default('1');
            $table->string('type')->default('custom');
            $table->unsignedInteger('edited_by')->nullable();
            $table->string('permission')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('page_layout')->nullable();
            $table->text('page_layout_settings')->nullable();
            $table->longText('main_content')->nullable();
            $table->string('header')->nullable();
            $table->string('footer')->nullable();
            $table->string('form_path')->nullable();
            $table->text('settings')->nullable();
            $table->string('content_type')->default('editor');
            $table->string('template')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();



            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('CASCADE');
            $table->foreign('parent_id')->references('id')
                ->on('frontend_pages')->onDelete('CASCADE');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_pages');
    }
}
