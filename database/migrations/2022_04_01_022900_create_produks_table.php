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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuliners_id')->nullable()->index('kuliners_id_fk20_idx');
            $table->foreignId('kuliner_cabangs_id')->nullable()->index('kuliner_cabangs_id_fk21_idx');
            $table->foreignId('kategori_produks_id')->nullable()->index('kategori_produks_id_fk22_idx');
            $table->string('nama');
            $table->string('photo');
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
        Schema::dropIfExists('produks');
    }
};
