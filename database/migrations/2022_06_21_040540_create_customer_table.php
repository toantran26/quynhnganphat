<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',250)->nullable();
            $table->integer('sex')->default(0);
            $table->string('avatar')->nullable();
            $table->date('birth')->nullable();
            $table->tinyInteger('is_trash')->default(0);
            $table->string('phone',13)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            
            $table->string('device_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
