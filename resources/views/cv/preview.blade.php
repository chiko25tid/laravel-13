
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Profesional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
            font-family: Arial, sans-serif;
            color: #273449;
        }

        .resume {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
            border-radius: 12px;
            overflow: hidden;
        }

        .resume-header {
            background: #172554;
            color: white;
            padding: 45px;
        }

        .resume-header-content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            flex-shrink: 0;
        }

        .resume-header h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .resume-body {
            padding: 40px 45px;
        }

        .section-title {
            color: #172554;
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dbeafe;
        }

        .skill {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 13px;
            margin: 4px;
            border-radius: 20px;
            font-size: 13px;
        }

        .project-card {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
        }

        .project-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .contact {
            color: #dbeafe;
            margin-right: 15px;
        }

        @media (max-width: 576px) {
            .resume-header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-photo {
                width: 120px;
                height: 120px;
            }

            .resume-header {
                padding: 25px;
            }

            .resume-body {
                padding: 25px;
            }
        }

        @media print {
            body {
                background: white;
            }

            .resume {
                margin: 0;
                max-width: 100%;
                box-shadow: none;
                border-radius: 0;
            }

            .no-print {
                display: none !important;
            }

            .resume-header {
                background: #172554 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .skill {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .project-card {
                break-inside: avoid;
            }
        }
    </style>
</head>
<body>

<div class="container text-center mt-4 no-print">
    <a href="{{ route('cv.index') }}" class="btn btn-secondary">
        Kembali ke Data CV
    </a>

    <button onclick="window.print()" class="btn btn-primary">
        Download / Cetak CV
    </button>
</div>

<div class="resume">

    @if($cv)

        <div class="resume-header">
            <div class="resume-header-content">

                @if($cv->foto)
                    <img
                        src="{{ asset('storage/' . $cv->foto) }}"
                        alt="Foto {{ $cv->nama }}"
                        class="profile-photo"
                    >
                @endif

                <div>
                    <h1>{{ $cv->nama }}</h1>

                    <p class="mb-3">
                        {{ $cv->deskripsi_diri ?? 'Profil profesional' }}
                    </p>

                    <div>
                        <span class="contact">{{ $cv->email }}</span>

                        @if($cv->telepon)
                            <span class="contact">{{ $cv->telepon }}</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="resume-body">

            <section class="mb-5">
                <h2 class="section-title">Tentang Saya</h2>

                <p>
                    {{ $cv->deskripsi_diri ?? 'Belum ada deskripsi diri.' }}
                </p>
            </section>

            <section class="mb-5">
                <h2 class="section-title">Pendidikan</h2>

                <h5>{{ $cv->pendidikan ?? 'Belum diisi' }}</h5>
            </section>

            <section class="mb-5">
                <h2 class="section-title">Keahlian</h2>

                @if($cv->keahlian)
                    @foreach(explode(',', $cv->keahlian) as $skill)
                        <span class="skill">
                            {{ trim($skill) }}
                        </span>
                    @endforeach
                @else
                    <p>Belum ada data keahlian.</p>
                @endif
            </section>

            <section>
                <h2 class="section-title">Proyek Portofolio</h2>

                <div class="row g-4">

                    @forelse($portofolios as $portofolio)

                        <div class="col-md-6">
                            <div class="project-card">

                                @if($portofolio->gambar)
                                    <img
                                        src="{{ asset('storage/' . $portofolio->gambar) }}"
                                        class="project-image"
                                        alt="{{ $portofolio->judul }}"
                                    >
                                @endif

                                <h5 class="fw-bold">
                                    {{ $portofolio->judul }}
                                </h5>

                                <p>{{ $portofolio->deskripsi }}</p>

                                @if($portofolio->teknologi)
                                    <span class="text-primary small">
                                        {{ $portofolio->teknologi }}
                                    </span>
                                @endif

                            </div>
                        </div>

                    @empty

                        <div class="col-12">
                            <p>Belum ada proyek portofolio yang ditampilkan.</p>
                        </div>

                    @endforelse

                </div>
            </section>

        </div>

    @else

        <div class="p-5 text-center">
            <h3>Data CV belum tersedia</h3>

            <p>Silakan tambahkan data CV terlebih dahulu.</p>

            <a href="{{ route('cv.create') }}" class="btn btn-primary">
                Buat CV Sekarang
            </a>
        </div>

    @endif

</div>

</body>
</html>
