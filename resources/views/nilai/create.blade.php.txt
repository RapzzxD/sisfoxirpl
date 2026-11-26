@extends('layouts.app')

@section('title', 'Input Nilai - Sisfo Akademik')
@section('page_title', 'Input Nilai Siswa')
@section('page_subtitle', 'Nilai akhir dihitung otomatis (Tugas 20% + UTS 30% + UAS 50%)')

@section('content')
<div class="card-clean p-4" style="max-width: 720px;">
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Siswa</label>
                <select name="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $s)
                        <option value="{{ $s->id }}" @selected(old('siswa_id') == $s->id)>
                            {{ $s->nama_siswa }} ({{ $s->kelas->nama_kelas ?? '-' }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" class="form-select" required>
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($mapels as $m)
                        <option value="{{ $m->id }}" @selected(old('mata_pelajaran_id') == $m->id)>
                            {{ $m->nama_mapel }} (KKM: {{ $m->kkm }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nilai Tugas (20%)</label>
                <input type="number" step="0.01" min="0" max="100" name="nilai_tugas" class="form-control" value="{{ old('nilai_tugas') }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nilai UTS (30%)</label>
                <input type="number" step="0.01" min="0" max="100" name="nilai_uts" class="form-control" value="{{ old('nilai_uts') }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nilai UAS (50%)</label>
                <input type="number" step="0.01" min="0" max="100" name="nilai_uas" class="form-control" value="{{ old('nilai_uas') }}" required>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan Nilai</button>
            <a href="{{ route('nilai.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection