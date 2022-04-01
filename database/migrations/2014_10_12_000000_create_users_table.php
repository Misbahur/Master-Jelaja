<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('roles_id')->nullable()->index('roles_id_fk1_idx');
            $table->string('jwt_token', 64)->nullable();
            $table->string('fcm_token', 64)->nullable();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo');
            $table->string('nomer_telepon', 14)->nullable();
            $table->string('nomer_ponsel', 14)->nullable();
            $table->srting('tempat_lahir')->nullable();
            $table->string('tanggal_lahir', 25)->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_ktp', 18)->nullable();
            $table->enum('status', ['aktif', 'non_aktif']);
            $table->string('created_by');
            // $table->rememberToken();
            $table->timestamps();
            $table->forign('roles_id')->references('id')->on('roles');
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
};
