<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->string('version');
            $table->string('name');
            $table->string('type');
            $table->tinyInteger('env')->default('0');
            $table->string('file_name');
            $table->longText('content')->nullable();
            $table->tinyInteger('is_generated')->default('0');
            $table->tinyInteger('is_generated_front')->default('0');
            $table->tinyInteger('active')->default('0');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('author_id')->references('id')
                ->on('users')->onDelete('CASCADE');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versions');
    }
}
