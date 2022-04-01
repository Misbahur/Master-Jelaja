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
        Schema::create('konfigurasi_hargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipes_id')->nullable()->index('tipes_id_fk6_idx');
            $table->foreignId('kamars_id')->nullable()->index('kamars_id_fk7_idx');
            $table->foreignId('haris_id')->nullable()->index('haris_id_fk8_idx');
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
        Schema::dropIfExists('konfigurasi_hargas');
    }
};
