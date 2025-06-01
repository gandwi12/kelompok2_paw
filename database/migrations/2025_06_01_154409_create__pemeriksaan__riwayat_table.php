<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();  // id bertipe unsignedBigInteger auto increment
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('pemeriksaan_riwayat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');  // harus unsignedBigInteger kalau pasien.id juga id()
            $table->date('tanggal_pemeriksaan');
            $table->string('diagnosa');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            $table->foreign('mahasiswa_id')
            ->references('id')->on('mahasiswa')
            ->onDelete('cascade');

        
});

    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_riwayat');
    }
};
