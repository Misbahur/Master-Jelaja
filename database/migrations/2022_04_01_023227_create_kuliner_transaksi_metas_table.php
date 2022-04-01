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
        Schema::create('kuliner_transaksi_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuliner_transaksis_id')->nullable()->index('hotel_transaksis_id_fk25_idx');
            // $table->foreignId('mbuh')->nullable()->index('mbuh_fk26_idx'); ogak eruh iki entuk teko ndi
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
        Schema::dropIfExists('kuliner_transaksi_metas');
    }
};
