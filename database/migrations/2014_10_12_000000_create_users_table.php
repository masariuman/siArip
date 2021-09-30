<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('rinku')->nullable();
            $table->string('juugyouinBangou')->nullable();
            $table->string('nip9')->nullable();
            $table->string('gelarDepan')->nullable();
            $table->string('name')->nullable();
            $table->string('gelarBelakang')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('email')->unique()->nullable();;
            $table->string('yuuzaaMei')->nullable();
            $table->text('sashin')->default('avatar.jpg');
            $table->enum('reberu', ['3', '2', '1', '0'])->default('3')->comment('3 = Normal User, 2 = Admin Ruangan, 1 = Super Admin, 0 = Lagendary Admin');
            $table->unsignedBigInteger('heyasubBidang_id_id');
            $table->foreign('subBidang_id')->references('id')->on('ref_subbid');
            $table->unsignedBigInteger('role_id')->nullable();;
            $table->foreign('role_id')->references('id')->on('userRoles');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->enum('sutattsu', ['1', '0'])->default('1');
            $table->enum('login', ['1', '0'])->default('1');
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
        Schema::dropIfExists('users');
    }
}
