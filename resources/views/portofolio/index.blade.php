
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">Data Portofolio</h2>

    <a href="{{ route('portofolio.create') }}" class="btn btn-primary mb-3">
        Tambah Portofolio
    </a>

    <a href="{{ route('cv.index') }}" class="btn btn-secondary mb-3">
        Data CV
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Teknologi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portofolios as $portofolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($portofolio->gambar)
                                <img src="{{ asset('storage/' . $portofolio->gambar) }}"
                                     width="90" alt="Gambar portofolio">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>{{ $portofolio->judul }}</td>
                        <td>{{ $portofolio->teknologi }}</td>
                        <td>
                            @if($portofolio->is_published)
                                <span class="badge bg-success">Include</span>
                            @else
                                <span class="badge bg-secondary">Exclude</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('portofolio.edit', $portofolio->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('portofolio.destroy', $portofolio->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus portofolio ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data portofolio.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
