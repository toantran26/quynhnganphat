<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi');
            $table->string('title_en')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('content_vi');
            $table->text('content_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            $table->string('mb_avatar')->nullable();
            $table->string('source')->nullable();
            $table->string('pseudonym')->nullable();
            $table->datetime('public_date')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('key_seo')->nullable();
            $table->string('desc_seo')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('customer_id')->nullable(); /// người dùng gửi bài đăng bài
            $table->integer('views')->default(1);
            $table->unsignedBigInteger('last_edit_user')->nullable();
            $table->foreign('last_edit_user')->references('id')->on('users');
            $table->unsignedBigInteger('unpush_user')->nullable();
            $table->foreign('unpush_user')->references('id')->on('users');
            $table->integer('last_edit')->nullable();
            $table->integer('last_time_edit')->nullable();
            $table->integer('is_emagazine')->default(0);
            $table->integer('hot_news')->nullable();
            $table->integer('top_news')->nullable();
            $table->integer('layout')->default(0)->nullable();
            $table->integer('status',0)->default(0);
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
