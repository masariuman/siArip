<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIdentitasPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitasPegawai', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();

            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('users');

            $table->text('alamat')->default('');
            $table->string('telepon')->default('');
            $table->string('handphone')->default('');
            $table->string('emailDinas')->default('');
            $table->string('emailPribadi')->default('');
            $table->string('nik')->default('');
            $table->string('nomorKK')->default('');

            $table->unsignedBigInteger('agama_id')->nullable();
            $table->foreign('agama_id')->references('id')->on('ref_agama');

            $table->string('lokasiKerja')->default('');
            $table->string('akta')->default('');
            $table->string('npwp')->default('');
            $table->date('tanggalNpwp')->nullable();
            $table->string('bpjs')->default('');
            $table->string('karis')->default('');
            $table->string('taspen')->default('');
            $table->date('tanggalTaspen')->nullable();
            $table->string('tapera')->default('');
            $table->string('kppn')->default('');
            $table->string('kelasJabatan')->default('');
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
        Schema::dropIfExists('identitasPegawai');
    }
}
