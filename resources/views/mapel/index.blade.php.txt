@extends('layouts.app')

@section('title', 'Mata Pelajaran - Sisfo Akademik')
@section('page_title', 'Mata Pelajaran')
@section('page_subtitle', 'Kelola daftar mata pelajaran dan nilai KKM')

@section('content')
<div class="card-clean p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Mata Pelajaran</h6>
        <a href="{{ route('mapel.create') }}" class="btn btn-primary btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Mapel
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Kode Mapel</th>
                    <th>Nama Mata Pelajaran</th>
                    <th class="text-center">KKM</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mapels as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="fw-semibold">{{ $item->kode_mapel }}</td>
                        <td>{{ $item->nama_mapel }}</td>
                        <td class="text-center"><span class="badge text-bg-info">{{ $item->kkm }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('mapel.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('mapel.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus mata pelajaran ini?')">
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
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data mata pelajaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection