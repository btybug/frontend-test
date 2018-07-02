<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CsCommentsProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_comments_profile',function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_by');
            $table->string('profile_name');
            $table->string('like_system');
            $table->string('allow_reply');
            $table->string('site_embedding');
            $table->string('allow_sorting_filter');
            $table->string('users_options');
            $table->integer('avatar_type')->default('0');
            $table->integer('avatar_variation_id')->default('0');
            $table->string('comment_allowed');
            $table->string('border_num')->nullable();
            $table->string('border_unit')->nullable();
            $table->string('border_prop')->nullable();
            $table->string('bg_color')->nullable();
            $table->integer('username_type')->default('0');
            $table->integer('username_variation_id')->default('0');
            $table->integer('date_type')->default('0');
            $table->integer('date_variation_id')->default('0');
            $table->integer('description_type')->default('0');
            $table->integer('description_variation_id')->default('0');
            $table->timestamps();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_comments_profile');
    }
}
