<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kereta', function (Blueprint $table) {
            $table->id('id_kereta');
            $table->string('nama_kereta', 100);
            $table->enum('kelas', ['Ekonomi', 'Bisnis', 'Eksekutif']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kereta');
    }
};
