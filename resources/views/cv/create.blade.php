
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Tambah Data CV</h4>
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

            <form action="{{ route('cv.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text"
                           name="telepon"
                           class="form-control"
                           value="{{ old('telepon') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Diri</label>
                    <textarea name="deskripsi_diri"
                              class="form-control">{{ old('deskripsi_diri') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pendidikan</label>
                    <input type="text"
                           name="pendidikan"
                           class="form-control"
                           value="{{ old('pendidikan') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Keahlian</label>
                    <textarea name="keahlian"
                              class="form-control">{{ old('keahlian') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('cv.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
