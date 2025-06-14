@extends('Pemeriksaan.app')

@section('content')
<div class="container"> </div>
    <h2>Edit Riwayat Pemeriksaan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemeriksaan_riwayat.update', $pemeriksaanRiwayat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required
           value="{{ old('nama_mahasiswa', $pemeriksaanRiwayat->nama_mahasiswa ?? '') }}">
</div>

        <div class="mb-3">
            <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" 
                   class="form-control" value="{{ $pemeriksaanRiwayat->tanggal_pemeriksaan }}" required>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea name="diagnosa" id="diagnosa" rows="3" class="form-control" required>{{ $pemeriksaanRiwayat->diagnosa }}</textarea>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{ $pemeriksaanRiwayat->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemeriksaan_riwayat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection