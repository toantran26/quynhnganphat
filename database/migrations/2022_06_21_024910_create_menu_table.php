<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable();
            $table->string('link');
            $table->unsignedBigInteger('cate_id')->nullable();
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->integer('parent_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('position');
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
        Schema::dropIfExists('menu');
    }
}
