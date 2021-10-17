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
