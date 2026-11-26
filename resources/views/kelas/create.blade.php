@extends('layouts.app')

@section('title', 'Tambah Kelas - Sisfo Akademik')
@section('page_title', 'Tambah Kelas')
@section('page_subtitle', 'Tambahkan data kelas baru ke sistem')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}" placeholder="Contoh: XI RPL 1" required>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tingkat</label>
                <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat') }}" placeholder="Contoh: XI" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran', '2026/2027') }}" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection