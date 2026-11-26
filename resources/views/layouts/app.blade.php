<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sisfo Akademik')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --acad-navy: #0f172a;
            --acad-slate: #1e293b;
            --acad-accent: #2563eb;
            --acad-bg: #f1f5f9;
        }
        body {
            background-color: var(--acad-bg);
            color: #1e293b;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--acad-navy) 0%, var(--acad-slate) 100%);
            color: #e2e8f0;
        }
        .sidebar .brand-box {
            padding: 1.25rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 0.5rem;
            padding: 0.65rem 0.9rem;
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            background-color: var(--acad-accent);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
        }
        .main-content {
            flex: 1;
            min-width: 0;
        }
        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }
        .card-clean {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.85rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
        }
        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column flex-lg-row">
        <aside class="sidebar d-flex flex-column">
            <div class="brand-box d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary p-2 rounded-3">
                        <i class="bi bi-mortarboard-fill fs-6"></i>
                    </span>
                    <div>
                        <div class="fw-bold text-white lh-1">SISFO AKADEMIK</div>
                        <small class="text-secondary" style="font-size: 0.75rem;">Portal Data Sekolah</small>
                    </div>
                </div>
                <button class="btn btn-sm btn-outline-light d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <div class="collapse d-lg-block p-3 flex-grow-1" id="sidebarNav">
                <div class="text-uppercase text-secondary fw-semibold px-2 mb-2" style="font-size: 0.7rem; letter-spacing: 0.06em;">
                    Menu Utama
                </div>
                <nav class="nav flex-column">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i> Dashboard
                    </a>
                    <a href="{{ route('kelas.index') }}" class="nav-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Data Kelas
                    </a>
                    <a href="{{ route('siswa.index') }}" class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> Data Siswa
                    </a>
                    <a href="{{ route('guru.index') }}" class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge-fill"></i> Data Guru
                    </a>
                    <a href="{{ route('mapel.index') }}" class="nav-link {{ request()->routeIs('mapel.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-bookmark-fill"></i> Mata Pelajaran
                    </a>
                    <a href="{{ route('nilai.index') }}" class="nav-link {{ request()->routeIs('nilai.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-check-fill"></i> Input & Rekap Nilai
                    </a>
                </nav>
            </div>

            <div class="p-3 border-top border-secondary border-opacity-25 small text-secondary d-none d-lg-block">
                Laravel • Bootstrap 5
            </div>
        </aside>

        <div class="main-content d-flex flex-column">
            <header class="topbar px-4 py-3 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0 fw-bold">@yield('page_title', 'Dashboard')</h5>
                    <small class="text-muted">@yield('page_subtitle', 'Ringkasan informasi akademik')</small>
                </div>
                <span class="badge rounded-pill text-bg-light border px-3 py-2 text-secondary">
                    <i class="bi bi-calendar3 me-1"></i> Tahun Ajaran Aktif
                </span>
            </header>

            <main class="p-4 flex-grow-1">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show card-clean border-0 border-start border-4 border-success" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show card-clean border-0 border-start border-4 border-danger" role="alert">
                        <div class="fw-semibold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Periksa kembali inputan kamu:</div>
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>