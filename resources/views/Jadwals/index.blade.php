@extends('layout.app')

@section('title', 'Daftar Jadwal Dokter')

@section('content') 

<div class="container mt-4">
    <h2 class="mb-4">Jadwal Dokter</h2>

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('jadwals.create') }}" class="btn btn-success">Tambah Jadwal</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nama Dokter</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->nama_dokter }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->jam_mulai }}</td>
                    <td>{{ $jadwal->jam_selesai }}</td>
                    <td>
                        <a href="{{ route('jadwals.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada jadwal dokter</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
