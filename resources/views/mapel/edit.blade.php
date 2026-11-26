@extends('layouts.app')

@section('title', 'Edit Mapel - Sisfo Akademik')
@section('page_title', 'Edit Mata Pelajaran')
@section('page_subtitle', 'Perbarui data mata pelajaran')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Kode Mapel</label>
                <input type="text" name="kode_mapel" class="form-control" value="{{ old('kode_mapel', $mapel->kode_mapel) }}" required>
            </div>
            <div class="col-md-5">
                <label class="form-label fw-semibold">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mapel" class="form-control" value="{{ old('nama_mapel', $mapel->nama_mapel) }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">KKM</label>
                <input type="number" name="kkm" class="form-control" min="0" max="100" value="{{ old('kkm', $mapel->kkm) }}" required>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('mapel.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection