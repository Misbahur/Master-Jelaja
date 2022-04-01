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
        Schema::create('kuliner_cabangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuliners_id')->nullable()->index('kuliners_id_fk17_idx');
            $table->string('nama');
            $table->string('alamat');
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
        Schema::dropIfExists('kuliner_cabangs');
    }
};