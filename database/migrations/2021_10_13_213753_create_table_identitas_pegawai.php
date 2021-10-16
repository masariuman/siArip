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

            $table->text('alamat')->default('')->nullable();
            $table->string('telepon')->default('')->nullable();
            $table->string('handphone')->default('')->nullable();
            $table->string('emailDinas')->default('')->nullable();
            $table->string('emailPribadi')->default('')->nullable();
            $table->string('nik')->default('')->nullable();
            $table->string('nomorKK')->default('')->nullable();

            $table->unsignedBigInteger('agama_id')->nullable();
            $table->foreign('agama_id')->references('id')->on('ref_agama');

            $table->string('lokasiKerja')->default('')->nullable();
            $table->string('akta')->default('')->nullable();
            $table->string('npwp')->default('')->nullable();
            $table->date('tanggalNpwp')->nullable()->nullable();
            $table->string('bpjs')->default('')->nullable();
            $table->string('karis')->default('')->nullable();
            $table->string('taspen')->default('')->nullable();
            $table->date('tanggalTaspen')->nullable();
            $table->string('tapera')->default('')->nullable();
            $table->string('kppn')->default('')->nullable();
            $table->string('kelasJabatan')->default('');

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
        Schema::dropIfExists('identitasPegawai');
    }
}
