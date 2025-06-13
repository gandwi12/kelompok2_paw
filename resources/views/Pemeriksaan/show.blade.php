@extends('Pemeriksaan.app')

@section('content')
<div class="container">
    <h2>Detail Riwayat Pemeriksaan</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mahasiswa: {{ $riwayat->mahasiswa->nama ?? 'Data mahasiswa tidak ditemukan' }}</h5>
            <p><strong>Tanggal Pemeriksaan:</strong> {{ \Carbon\Carbon::parse($riwayat->tanggal_pemeriksaan)->format('d-m-Y') }}</p>
            <p><strong>Diagnosa:</strong> {{ $riwayat->diagnosa }}</p>
            <p><strong>Keterangan:</strong> {{ $riwayat->keterangan ?? '-' }}</p>
            <p><strong>Dibuat pada:</strong> {{ $riwayat->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Terakhir diubah:</strong> {{ $riwayat->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('pemeriksaan_riwayat.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
</div>
@endsection
