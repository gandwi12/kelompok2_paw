@extends('Pemeriksaan.app')

@section('content')
<div class="container">
    <h2>Tambah Riwayat Pemeriksaan Mahasiswa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemeriksaan_riwayat.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
        <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="diagnosa" class="form-label">Diagnosa</label>
        <textarea name="diagnosa" id="diagnosa" rows="3" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
        <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
