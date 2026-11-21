
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Data CV</h4>
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

            <form action="{{ route('cv.update', $cv->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Foto Profil Saat Ini</label>

                    @if($cv->foto)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $cv->foto) }}"
                                 width="120"
                                 height="120"
                                 class="rounded-circle"
                                 style="object-fit: cover;"
                                 alt="Foto profil {{ $cv->nama }}">
                        </div>
                    @else
                        <p class="text-muted">Belum ada foto profil.</p>
                    @endif

                    <label class="form-label">Ganti Foto Profil</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $cv->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $cv->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                           value="{{ old('telepon', $cv->telepon) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Diri</label>
                    <textarea name="deskripsi_diri" class="form-control">{{ old('deskripsi_diri', $cv->deskripsi_diri) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control"
                           value="{{ old('pendidikan', $cv->pendidikan) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Keahlian</label>
                    <textarea name="keahlian" class="form-control">{{ old('keahlian', $cv->keahlian) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
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
