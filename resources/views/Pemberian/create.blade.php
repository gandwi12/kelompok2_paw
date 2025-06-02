<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambah Data Obat</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('obats.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama" id="nama" required>
                                <label for="nama">Nama Obat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="keterangan" id="keterangan" style="height: 100px;"></textarea>
                                <label for="keterangan">Keterangan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="status" id="status" class="form-select">
                                    <option value="siap_diberikan" selected>Siap Diberikan</option>
                                    <option value="diberikan">Sudah Diberikan</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Obat</button>
                        </form>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('obats.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
