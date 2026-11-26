@extends('layouts.app')

@section('title', 'Input & Rekap Nilai - Sisfo Akademik')
@section('page_title', 'Input & Rekap Nilai')
@section('page_subtitle', 'Bobot Tugas 20%, UTS 30%, UAS 50% dengan status otomatis berdasarkan KKM')

@section('content')
<div class="card-clean p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Rekap Nilai Siswa</h6>
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
                    <th class="text-center">Tugas</th>
                    <th class="text-center">UTS</th>
                    <th class="text-center">UAS</th>
                    <th class="text-center">Nilai Akhir</th>
                    <th class="text-center">Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilais as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-semibold">{{ $item->siswa->nama_siswa ?? '-' }}</td>
                        <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $item->mataPelajaran->nama_mapel ?? '-' }}</td>
                        <td class="text-center">{{ number_format($item->nilai_tugas, 2) }}</td>
                        <td class="text-center">{{ number_format($item->nilai_uts, 2) }}</td>
                        <td class="text-center">{{ number_format($item->nilai_uas, 2) }}</td>
                        <td class="text-center fw-bold">{{ number_format($item->nilai_akhir, 2) }}</td>
                        <td class="text-center">
                            @if ($item->status === 'Lulus')
                                <span class="badge text-bg-success">Lulus</span>
                            @else
                                <span class="badge text-bg-warning">Remedial</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('nilai.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data nilai ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">Belum ada data nilai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection