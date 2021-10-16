<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCpnspns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpnspns', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();

            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('users');
            $table->unsignedBigInteger('statusKepegawaian_id')->nullable();
            $table->foreign('statusKepegawaian_id')->references('id')->on('ref_statusKepegawaian');

            $table->text('nomorSkCpns')->nullable()->default('');
            $table->date('tanggalSkCpns')->nullable();
            $table->date('tmtCpns')->nullable();
            $table->text('namaPejabatPenetapCpns')->nullable()->default('');
            $table->text('nomorSkPns')->nullable()->default('');
            $table->date('tanggalSkPns')->nullable();
            $table->date('tmtPns')->nullable();
            $table->text('nomorSttpl')->nullable()->default('');
            $table->date('tanggalSttpl')->nullable();
            $table->text('nomorSpmt')->nullable()->default('');
            $table->date('tanggalSpmt')->nullable();
            $table->text('nomorPertekC2th')->nullable()->default('');
            $table->date('tanggalPertekC2th')->nullable();
            $table->text('nomorSkd')->nullable()->default('');
            $table->date('tanggalSkd')->nullable();
            $table->text('karpeg')->nullable()->default('');

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
        Schema::dropIfExists('cpnspns');
    }
}
