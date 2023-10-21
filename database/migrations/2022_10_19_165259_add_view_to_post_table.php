<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewToPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            // $table->string('icon_avatar')->nullable()->after("avatar");
            // $table->string('image_mobi')->nullable();// linh ảnh
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('description_vi');
            $table->dropColumn('description_en');

        });
    }
} 
