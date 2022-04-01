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
        Schema::create('hotel_transaksi_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_transaksis_id')->nullable()->index('hotel_transaksis_id_fk14_idx');
            $table->foreignId('konfigurasi_hargas_id')->nullable()->index('konfigurasi_hargas_id_fk14_idx');
            $table->double('harga');
            $table->integer('qty');
            $table->double('harga_total');
            $table->text('json_produk');
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
        Schema::dropIfExists('hotel_transaksi_metas');
    }
};
