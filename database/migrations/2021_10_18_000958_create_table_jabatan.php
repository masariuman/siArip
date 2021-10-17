<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();

            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('users');
            $table->unsignedBigInteger('jenisJabatan_id')->nullable();
            $table->foreign('jenisJabatan_id')->references('id')->on('ref_jenisJabatan');
            $table->unsignedBigInteger('subbid_id')->nullable();
            $table->foreign('subbid_id')->references('id')->on('ref_subbid');

            $table->text('jabatan')->nullable()->default('');
            $table->date('tmtJabatan')->nullable();
            $table->date('tmtPelantikan')->nullable();
            $table->text('nomorSk')->nullable()->default('');
            $table->date('tanggalSk')->nullable();

            $table->enum('sutattsu', ['1', '0', '2'])->default('1');
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
        Schema::dropIfExists('jabatan');
    }
}
