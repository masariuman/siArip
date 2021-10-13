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

            $table->text('alamat')->nullable()->default('');
            $table->string('telepon')->nullable()->default('');
            $table->string('handphone')->nullable()->default('');
            $table->string('emailDinas')->nullable()->default('');
            $table->string('emailPribadi')->nullable()->default('');
            $table->string('nik')->nullable()->default('');
            $table->string('nomorKK')->nullable()->default('');

            $table->unsignedBigInteger('agama_id')->nullable();
            $table->foreign('agama_id')->references('id')->on('ref_agama');

            $table->string('lokasiKerja')->nullable()->default('');
            $table->string('akta')->nullable()->default('');
            $table->string('npwp')->nullable()->default('');
            $table->date('tanggalNpwp')->nullable();
            $table->string('bpjs')->nullable()->default('');
            $table->string('karis')->nullable()->default('');
            $table->string('taspen')->nullable()->default('');
            $table->date('tanggalTaspen')->nullable();
            $table->string('tapera')->nullable()->default('');
            $table->string('kppn')->nullable()->default('');
            $table->string('kelasJabatan')->nullable()->default('');
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
