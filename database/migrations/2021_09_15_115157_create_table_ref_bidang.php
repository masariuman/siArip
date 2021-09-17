<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefBidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_bidang', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();
            $table->unsignedBigInteger('refUnor_id');
            $table->foreign('refUnor_id')->references('id')->on('ref_unor');
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
        Schema::dropIfExists('ref_bidang');
    }
}
