<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();

            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('users');
            $table->unsignedBigInteger('pangkat_id')->nullable();
            $table->foreign('pangkat_id')->references('id')->on('ref_pangkatGolonganRuang');
            $table->unsignedBigInteger('jenisNaikPangkat_id')->nullable();
            $table->foreign('jenisNaikPangkat_id')->references('id')->on('ref_jenisNaikPangkat');

            $table->text('masaKerjaGolonganTahun')->nullable()->default('');
            $table->text('masaKerjaGolonganBulan')->nullable()->default('');
            $table->date('tmtGolongan')->nullable();
            $table->text('nomorSk')->nullable()->default('');
            $table->date('tanggalSk')->nullable();
            $table->text('nomorPertek')->nullable()->default('');
            $table->date('tanggalPertek')->nullable();

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
        Schema::dropIfExists('pangkat');
    }
}
