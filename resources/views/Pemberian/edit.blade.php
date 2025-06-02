<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Data Obat</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('obats.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_obat" id="nama_obat"
                                       value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                                <label for="nama_obat">Nama Obat</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="keterangan" id="keterangan"
                                          style="height: 100px;">{{ old('keterangan', $obat->keterangan) }}</textarea>
                                <label for="keterangan">Keterangan</label>
                            </div>

                            <div class="form-floating mb-3">
