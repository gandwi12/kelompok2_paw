@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Daftar Dokter</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $i => $d)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $d->nama_dokter }}</td>
                <td>{{ $d->hari }}</td>
                <td>{{ $d->jam_mulai }}</td>
                <td>{{ $d->jam_selesai }}</td>
                <td>
                    <a href="{{ route('bookings.create', ['doctor' => $d->id]) }}" class="btn btn-primary btn-sm">Booking</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Riwayat Booking</h3>
    @if($bookings->isEmpty())
        <p>Belum Ada Riwayat Booking</p>
    @else
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Diagnosa Mandiri</th>
                    <th>Nama Dokter</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $i => $b)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->nim }}</td>
                    <td>{{ $b->diagnosa }}</td>
                    <td>{{ $b->doctor->nama_dokter }}</td>
                    <td>{{ $b->doctor->hari }}</td>
                    <td>{{ $b->doctor->jam_mulai }}</td>
                    <td>{{ $b->doctor->jam_selesai }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $b->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection