<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePemeriksaanRiwayatTable extends Migration
{
    public function up()
    {
        Schema::table('pemeriksaan_riwayat', function (Blueprint $table) {

            // Tambahkan kolom nama_mahasiswa
            if (!Schema::hasColumn('pemeriksaan_riwayat', 'nama_mahasiswa')) {
                $table->string('nama_mahasiswa')->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('pemeriksaan_riwayat', function (Blueprint $table) {
            // Balikkan perubahan jika rollback migration
            if (!Schema::hasColumn('pemeriksaan_riwayat', 'nama_mahasiswa')) {
                $table->unsignedBigInteger('nama_mahasiswa')->nullable()->after('nama_mahasiswa');
            }

        });
    }
}
