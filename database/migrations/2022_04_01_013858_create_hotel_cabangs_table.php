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
        Schema::create('hotel_cabangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotels_id')->nullable()->index('hotels_id_fk3_idx');
            $table->string('nama');
            $table->string('alamat', 25);
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
        Schema::dropIfExists('hotel_cabangs');
    }
};
