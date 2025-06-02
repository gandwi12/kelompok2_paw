@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Riwayat Pemeriksaan Mahasiswa</h2>

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
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach ($mahasiswa as $m)
                    <option value="{{ $m->id }}" 
                        {{ $pemeriksaanRiwayat->mahasiswa_id == $m->id ? 'selected' : '' }}>
                        {{ $m->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" 
                   class="form-control" value="{{ old('tanggal_pemeriksaan', $pemeriksaanRiwayat->tanggal_pemeriksaan) }}" required>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea name="diagnosa" id="diagnosa" rows="3" class="form-control" required>{{ old('diagnosa', $pemeriksaanRiwayat->diagnosa) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{ old('keterangan', $pemeriksaanRiwayat->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemeriksaan_riwayat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
