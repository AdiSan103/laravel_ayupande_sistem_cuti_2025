<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jatah_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->year('tahun');
            $table->integer('jatah_cuti');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jatah_cuti');
    }
};
