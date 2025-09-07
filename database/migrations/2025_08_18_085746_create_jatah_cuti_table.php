<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jatah_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('pengguna')->onDelete('cascade');
            $table->year('tahun');
            $table->integer('jatah_cuti')->default(12);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jatah_cuti');
    }
};
