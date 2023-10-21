<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi');
            $table->string('title_en')->nullable();
            $table->text('position_vi')->nullable();
            $table->text('position_en')->nullable();
            $table->text('content_vi');
            $table->text('content_en')->nullable();
            $table->string('offer')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            $table->string('icon_avatar')->nullable();
            $table->integer('amount')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('key_seo')->nullable();
            $table->string('desc_seo')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->integer('status',0)->default(0);
            $table->integer('is_trash',0)->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
