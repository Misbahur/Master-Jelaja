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
        Schema::create('konfigurasi_harga_khususes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipes_id')->nullable()->index('tipes_id_fk9_idx');
            $table->foreignId('kamars_id')->nullable()->index('kamars_id_fk10_idx');
            $table->foreignId('haris_id')->nullable()->index('haris_id_fk11_idx');
            $table->string('tanggal', 25);
            $table->string('created_by');
            $table->enum('status', ['aktif', 'non_aktif']);
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
        Schema::dropIfExists('konfigurasi_harga_khususes');
    }
};
