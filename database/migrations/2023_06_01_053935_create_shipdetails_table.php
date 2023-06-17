<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipdetails', function (Blueprint $table) {
            $table->id();
            $table->string('rcv_name')->nullable();
            $table->string('rcv_uid')->nullable();
            $table->string('rcv_email')->nullable();
            $table->string('rcv_phone')->nullable();
            $table->string('rcv_add')->nullable();
            $table->string('rcv_city')->nullable();
            $table->string('rcv_district')->nullable();
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('shipdetails');
    }
};
