<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DemoMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_menu_items',function (Blueprint $table){
           $table->string('id')->primary();
           $table->unsignedInteger('menu_id')->index();
           $table->unsignedInteger('page_id')->index();
           $table->string('parent_id')->index()->nullable();
           $table->unsignedInteger('role_id');
           $table->string('title')->nullable();
           $table->text('url')->nullable();
           $table->integer('sort');
           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->nullable();


            $table->foreign('menu_id')->references('id')
                ->on('demo_menus')->onDelete('CASCADE');


            $table->foreign('page_id')->references('id')
                ->on('core_pages')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demo_menu_items');
    }
}
