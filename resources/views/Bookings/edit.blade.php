@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Edit Booking</h3>
  <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
      <label>Nama</label>
      <input class="form-control" name="nama" value="{{ $booking->nama }}" required>
    </div>
    
    <div class="mb-3">
      <label>NIM</label>
      <input class="form-control" name="nim" value="{{ $booking->nim }}" required>
    </div>
    
    <div class="mb-3">
      <label>Pilih Dokter</label>
      <select name="doctor_id" class="form-control">
        @foreach($doctors as $d)
          <option value="{{ $d->id }}" {{ $booking->doctor_id == $d->id ? 'selected' : '' }}>
            {{ $d->nama_dokter }} / {{ $d->hari }} {{ $d->jam_mulai }}
          </option>
        @endforeach
      </select>
    </div>
    
    <div class="mb-3">
      <label>Diagnosa Mandiri</label>
      <textarea name="diagnosa" class="form-control" required>{{ $booking->diagnosa }}</textarea>
    </div>
    
    <button class="btn btn-primary">Update Booking</button>
  </form>
</div>
@endsection