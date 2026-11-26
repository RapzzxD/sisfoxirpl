@extends('layouts.app')

@section('title', 'Dashboard - Sisfo Akademik')
@section('page_title', 'Dashboard Akademik')
@section('page_subtitle', 'Pantauan cepat data kelas, siswa, guru, mapel, dan nilai')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl">
        <div class="card-clean p-3 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Total Kelas</div>
                    <div class="fs-4 fw-bold mt-1">{{ $stats['total_kelas'] }}</div>
                </div>
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-building"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card-clean p-3 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Total Siswa</div>
                    <div class="fs-4 fw-bold mt-1">{{ $stats['total_siswa'] }}</div>
                </div>
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card-clean p-3 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Total Guru</div>
                    <div class="fs-4 fw-bold mt-1">{{ $stats['total_guru'] }}</div>
                </div>
                <div class="stat-icon bg-info bg-opacity-10 text-info">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card-clean p-3 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Mata Pelajaran</div>
                    <div class="fs-4 fw-bold mt-1">{{ $stats['total_mapel'] }}</div>
                </div>
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl">
        <div class="card-clean p-3 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Rata-Rata Nilai</div>
                    <div class="fs-4 fw-bold mt-1">{{ number_format($stats['rata_rata_nilai'], 2) }}</div>
                </div>
                <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-clean p-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h6 class="fw-bold mb-0">Rekap Nilai Terbaru</h6>
            <small class="text-muted">5 input nilai terakhir yang tercatat di sistem</small>
        </div>
        <a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Input Nilai
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th class="text-center">Nilai Akhir</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilaiTerbaru as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $item->siswa->nama_siswa ?? '-' }}</td>
                        <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $item->mataPelajaran->nama_mapel ?? '-' }}</td>
                        <td class="text-center fw-bold">{{ number_format($item->nilai_akhir, 2) }}</td>
                        <td class="text-center">
                            @if ($item->status === 'Lulus')
                                <span class="badge text-bg-success">Lulus</span>
                            @else
                                <span class="badge text-bg-warning">Remedial</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data nilai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection