@extends('layouts.app')

@section('title', 'Edit Kelas - Sisfo Akademik')
@section('page_title', 'Edit Kelas')
@section('page_subtitle', 'Perbarui informasi kelas')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tingkat</label>
                <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat', $kelas->tingkat) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran', $kelas->tahun_ajaran) }}" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $kelas->jurusan) }}" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('kelas.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection