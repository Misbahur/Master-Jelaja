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
        Schema::create('kuliner_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->index('users_id_fk23_idx');
            $table->foreignId('kuliner_cabangs_id')->nullable()->index('hotel_cabangs_id_fk24_idx');
            $table->string('tanggal', 25);
            $table->double('harga');
            $table->integer('qty');
            $table->double('harga_total');
            $table->double('biaya_admin');
            $table->double('pajak');
            $table->double('harga_final');
            $table->text('json_item');
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
        Schema::dropIfExists('kuliner_transaksis');
    }
};
