<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('pengguna')->onDelete('cascade');
            $table->foreignId('id_jenis_cuti')->constrained('jenis_cuti')->onDelete('cascade');
            $table->text('alasan')->nullable();
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('lama_hari');
            $table->text('alamat')->nullable();
            $table->boolean('verifikasi_user_1')->default(false);
            $table->boolean('verifikasi_user_2')->default(false);
            $table->boolean('verifikasi_bupati')->default(false);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};
