<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Pemberian Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Data Pemberian Obat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemberian-obat.store') }}" method="POST">
        @csrf
        
        <!-- Pilih Obat -->
        <div class="form-floating mb-3">
            <select name="obat_id" id="obat_id" class="form-select" required>
                <option value="" disabled selected>-- Pilih Obat --</option>
                @foreach ($obats as $obat)
                    <option value="{{ $obat->id }}" {{ old('obat_id') == $obat->id ? 'selected' : '' }}>
                        {{ $obat->nama_obat }}
                    </option>
                @endforeach
            </select>
            <label for="obat_id">Nama Obat</label>
        </div>

        <!-- Tanggal Diberikan -->
        <div class="form-floating mb-3">
            <input
                type="date"
                name="diberikan_pada"
                id="diberikan_pada"
                class="form-control"
                value="{{ old('diberikan_pada', date('Y-m-d')) }}"
                required
            />
            <label for="diberikan_pada">Tanggal Diberikan</label>
        </div>

        <!-- Catatan -->
        <div class="form-floating mb-3">
            <textarea
                name="catatan"
                id="catatan"
                class="form-control"
                style="height: 100px;"
                placeholder="Catatan (optional)"
            >{{ old('catatan') }}</textarea>
            <label for="catatan">Catatan</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('pemberian-obat.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</body>
</html>
