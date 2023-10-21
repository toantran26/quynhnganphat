<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi');
            $table->string('title_en')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('top_cate')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('key_seo')->nullable();
            $table->string('desc_seo')->nullable();
            $table->integer('status')->default(0);
            $table->integer('is_trash')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
