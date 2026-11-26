@extends('layouts.app')

@section('title', 'Edit Siswa - Sisfo Akademik')
@section('page_title', 'Edit Siswa')
@section('page_subtitle', 'Perbarui data siswa')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">NIS</label>
                <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
            </div>
            <div class="col-md-8">
                <label class="form-label fw-semibold">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="Laki-Laki" @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Laki-Laki')>Laki-Laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Perempuan')>Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kelas</label>
                <select name="kelas_id" class="form-select" required>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" @selected(old('kelas_id', $siswa->kelas_id) == $k->id)>{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">No. HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $siswa->no_hp) }}" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection