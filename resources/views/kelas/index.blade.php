@extends('layouts.app')

@section('title', 'Data Kelas - Sisfo Akademik')
@section('page_title', 'Data Kelas')
@section('page_subtitle', 'Kelola daftar kelas, tingkat, jurusan, dan tahun ajaran')

@section('content')
<div class="card-clean p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Kelas</h6>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kelas
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Tingkat</th>
                    <th>Jurusan</th>
                    <th>Tahun Ajaran</th>
                    <th class="text-center">Jumlah Siswa</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelas as $i =>$item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-semibold">{{ $item->nama_kelas }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->tahun_ajaran }}</td>
                        <td class="text-center"><span class="badge text-bg-secondary">{{ $item->siswas_count }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data kelas ini?')">
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
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data kelas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection