<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->unsignedBigInteger('id_kereta');
            $table->string('stasiun_asal', 100);
            $table->string('stasiun_tujuan', 100);
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->timestamps();

            $table->foreign('id_kereta')->references('id_kereta')->on('kereta')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
