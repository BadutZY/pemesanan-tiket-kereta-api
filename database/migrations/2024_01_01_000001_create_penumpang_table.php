<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penumpang', function (Blueprint $table) {
            $table->id('id_penumpang');
            $table->string('nama_penumpang', 100);
            $table->string('nik', 16)->unique();
            $table->string('no_hp', 15);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penumpang');
    }
};
