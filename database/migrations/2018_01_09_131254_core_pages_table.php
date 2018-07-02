<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_pages',function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->string('slug')->nullable();
            $table->string('view_url');
            $table->tinyInteger('system_page');
            $table->string('status');
            $table->string('visibility');
            $table->unsignedInteger('parent_id')->nullable();
            $table-> enum('page_type',['core', 'custom', 'plugin']);
            $table->text('plugin')->nullable();
            $table->unsignedInteger('blog_id')->nullable();
            $table->text('user_group')->nullable();
            $table->string('layout_id')->nullable();
            $table->enum('layout_option',
                ['layout-except-body','layout-except-body-extra',
                    'layout-except-body-side-bar','free-page']);
            $table->text('data_option')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')
                ->on('core_pages')->onDelete('CASCADE');

            $table->foreign('blog_id')->references('id')
                ->on('blogs')->onDelete('CASCADE');



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_pages');
    }
}
