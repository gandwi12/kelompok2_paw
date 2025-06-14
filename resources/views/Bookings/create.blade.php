@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Form Booking</h3>
  <form action="{{ route('bookings.store') }}" method="POST">
    @csrf
    <input type="hidden" name="doctor_id" value="{{ $jadwal->id }}">

    <div class="mb-3">
      <label>Nama</label>
      <input class="form-control" name="nama" required>
    </div>
    <div class="mb-3">
      <label>NIM</label>
      <input class="form-control" name="nim" required>
    </div>
    <div class="mb-3">
      <label>Diagnosa Mandiri</label>
      <textarea name="diagnosa" class="form-control" required></textarea>
    </div>
    <button class="btn btn-success">Booking</button>
  </form>
</div>
@endsection
