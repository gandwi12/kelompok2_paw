<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pemeriksaan_riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa')->nullable();
            $table->date('tanggal_pemeriksaan');
            $table->string('diagnosa');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemeriksaan_riwayat');
    }
};
