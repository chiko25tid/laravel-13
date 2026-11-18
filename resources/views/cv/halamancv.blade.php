```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Builder - Buat CV Profesional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar {
            background: #172554;
        }

        .hero {
            min-height: 85vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #172554, #1d4ed8);
            color: white;
            padding: 70px 0;
        }

        .hero h1 {
            font-size: clamp(36px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.2;
        }

        .hero p {
            font-size: 18px;
            color: #dbeafe;
            line-height: 1.8;
        }

        .btn-create {
            background: white;
            color: #172554;
            padding: 14px 28px;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-create:hover {
            background: #dbeafe;
            color: #172554;
        }

        .btn-data {
            border: 1px solid white;
            color: white;
            padding: 14px 28px;
            border-radius: 8px;
        }

        .btn-data:hover {
            background: white;
            color: #172554;
        }

        .resume-card {
            background: white;
            color: #1e293b;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2);
            transform: rotate(2deg);
        }

        .resume-top {
            background: #172554;
            color: white;
            padding: 25px;
            border-radius: 8px;
        }

        .resume-line {
            height: 8px;
            background: #e2e8f0;
            border-radius: 10px;
            margin: 12px 0;
        }

        .feature {
            background: white;
            padding: 28px;
            border-radius: 12px;
            height: 100%;
            border: 1px solid #e2e8f0;
        }

        .feature-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }

        footer {
            background: #172554;
            color: #cbd5e1;
            padding: 22px;
            text-align: center;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('halamancv.home') }}">
            CV Builder
        </a>

        <div class="ms-auto d-flex gap-2">
            <a href="{{ route('cv.index') }}" class="btn btn-outline-light">
                Data CV
            </a>

            <a href="{{ route('cv.create') }}" class="btn btn-light">
                Buat CV
            </a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-7">
                <span class="badge bg-light text-primary mb-3 p-2">
                    CV Builder Online
                </span>

                <h1>Buat CV Profesional dengan Mudah</h1>

                <p class="my-4">
                    Buat CV yang menarik untuk melamar pekerjaan.
                    Masukkan informasi diri, pendidikan, keahlian, dan
                    foto profil, lalu lihat hasil CV kamu dalam satu halaman.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('cv.create') }}" class="btn btn-create">
                        Buat CV Sekarang &rarr;
                    </a>

                    <a href="{{ route('cv.index') }}" class="btn btn-data">
                        Lihat Data CV
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="resume-card">
                    <div class="resume-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center fw-bold"
                                 style="width:65px;height:65px;">
                                CV
                            </div>

                            <div>
                                <h4 class="mb-1 fw-bold">Nama Kamu</h4>
                                <small>Profesional / Mahasiswa</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h6 class="fw-bold text-primary">TENTANG SAYA</h6>
                        <div class="resume-line" style="width:100%"></div>
                        <div class="resume-line" style="width:85%"></div>

                        <h6 class="fw-bold text-primary mt-4">PENDIDIKAN</h6>
                        <div class="resume-line" style="width:75%"></div>

                        <h6 class="fw-bold text-primary mt-4">KEAHLIAN</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <span class="badge bg-primary">HTML</span>
                            <span class="badge bg-primary">CSS</span>
                            <span class="badge bg-primary">Laravel</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Buat CV dalam 3 Langkah</h2>
            <p class="text-secondary">
                Proses sederhana untuk membuat CV kamu.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature">
                    <div class="feature-icon">📝</div>
                    <h5 class="fw-bold">1. Isi Data Diri</h5>
                    <p class="text-secondary mb-0">
                        Masukkan nama, kontak, pendidikan, keahlian, dan foto profil.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature">
                    <div class="feature-icon">📄</div>
                    <h5 class="fw-bold">2. Lihat Preview</h5>
                    <p class="text-secondary mb-0">
                        Periksa hasil CV berdasarkan informasi yang sudah kamu masukkan.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature">
                    <div class="feature-icon">⬇️</div>
                    <h5 class="fw-bold">3. Cetak CV</h5>
                    <p class="text-secondary mb-0">
                        Cetak atau simpan CV sebagai PDF melalui browser.
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('cv.create') }}" class="btn btn-primary btn-lg px-5">
                Mulai Buat CV
            </a>
        </div>
    </div>
</section>

<footer>
    &copy; {{ date('Y') }} CV Builder. Buat CV profesional dengan mudah.
</footer>

</body>
</html>
```