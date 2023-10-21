<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
            $table->integer('order_no')->nullable();
            $table->string('image')->nullable();// linh ảnh
            $table->string('image_mobi')->nullable();// linh ảnh
            $table->integer('is_trash')->default(0);
            $table->integer('location')->default(1); // 1 là ở headerr 2: cennter 3 footer
            $table->integer('is_page')->default(1); //1 home 2 cate 3 detail
            $table->string('link')->nullable();// linh ảnh
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
        Schema::dropIfExists('banners');
    }
}
