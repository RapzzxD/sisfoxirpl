@extends('layouts.app')

@section('title', 'Edit Guru - Sisfo Akademik')
@section('page_title', 'Edit Guru')
@section('page_subtitle', 'Perbarui data guru')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3 mb-3">
            <div class="col-md-5">
                <label class="form-label fw-semibold">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}" required>
            </div>
            <div class="col-md-7">
                <label class="form-label fw-semibold">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru', $guru->nama_guru) }}" required>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="Laki-Laki" @selected(old('jenis_kelamin', $guru->jenis_kelamin) === 'Laki-Laki')>Laki-Laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin', $guru->jenis_kelamin) === 'Perempuan')>Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $guru->no_hp) }}" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $guru->email) }}" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('guru.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection