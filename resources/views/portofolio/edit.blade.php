
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Portofolio</h4>
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('portofolio.update', $portofolio->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Proyek</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ old('judul', $portofolio->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $portofolio->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teknologi</label>
                    <input type="text" name="teknologi" class="form-control"
                           value="{{ old('teknologi', $portofolio->teknologi) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>

                    @if($portofolio->gambar)
                        <img src="{{ asset('storage/' . $portofolio->gambar) }}"
                             width="150" class="mb-2" alt="Gambar portofolio">
                    @else
                        <p>Belum ada gambar.</p>
                    @endif

                    <input type="file" name="gambar" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Portofolio</label>
                    <select name="is_published" class="form-select" required>
                        <option value="1"
                            {{ old('is_published', $portofolio->is_published) == 1 ? 'selected' : '' }}>
                            Include - Tampilkan
                        </option>
                        <option value="0"
                            {{ old('is_published', $portofolio->is_published) == 0 ? 'selected' : '' }}>
                            Exclude - Sembunyikan
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('portofolio.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
