<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Jadwal Dokter</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_dokter" id="nama_dokter"
                                       value="{{ old('nama_dokter', $jadwal->nama_dokter) }}" required>
                                <label for="nama_dokter">Nama Dokter</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="hari" id="hari"
                                       value="{{ old('hari', $jadwal->hari) }}" required>
                                <label for="hari">Hari Praktik</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" name="jam_mulai" id="jam_mulai"
                                       value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                                <label for="jam_mulai">Jam Mulai</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" name="jam_selesai" id="jam_selesai"
                                       value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
                                <label for="jam_selesai">Jam Selesai</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Update Jadwal</button>
                        </form>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('jadwals.index') }}" class="btn btn-secondary"> Kembali </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
