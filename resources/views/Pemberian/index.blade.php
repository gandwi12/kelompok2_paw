@extends('layout.app')

@section('title', 'Daftar Obat')

@section('contents')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Obat</h2>

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('obats.create') }}" class="btn btn-success">Tambah Obat</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nama Obat</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($obats as $obat)
                <tr>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->keterangan }}</td>
                    <td>
                        @if($obat->status === 'diberikan')
                            <span class="badge bg-success">Sudah Diberikan</span>
                        @else
                            <span class="badge bg-warning text-dark">Siap Diberikan</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('obats.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('obats.destroy', $obat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data obat</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
