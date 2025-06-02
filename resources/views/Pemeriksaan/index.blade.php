@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Riwayat Pemeriksaan Mahasiswa</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pemeriksaan_riwayat.create') }}" class="btn btn-primary mb-3">Tambah Riwayat Pemeriksaan</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Diagnosa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayats as $index => $riwayat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $riwayat->mahasiswa->nama ?? 'Data mahasiswa tidak ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                    <td>{{ $riwayat->diagnosa }}</td>
                    <td>{{ $riwayat->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pemeriksaan_riwayat.edit', $riwayat->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('pemeriksaan_riwayat.destroy', $riwayat->id) }}" method="POST" style="display:inline-block" 
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada riwayat pemeriksaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
