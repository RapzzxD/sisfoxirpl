@extends('layouts.app')

@section('title', 'Tambah Guru - Sisfo Akademik')
@section('page_title', 'Tambah Guru')
@section('page_subtitle', 'Tambahkan data guru baru')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-5">
                <label class="form-label fw-semibold">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
            </div>
            <div class="col-md-7">
                <label class="form-label fw-semibold">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru') }}" required>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-Laki" @selected(old('jenis_kelamin') === 'Laki-Laki')>Laki-Laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('guru.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection