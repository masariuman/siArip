<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefSubbid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_subbid', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();
            $table->unsignedBigInteger('refBidang_id');
            $table->foreign('refBidang_id')->references('id')->on('ref_bidang');
            $table->string('name')->nullable();
            $table->enum('sutattsu', ['1', '0'])->default('1');
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
        Schema::dropIfExists('ref_subbid');
    }
}
