<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['siswa.kelas', 'mataPelajaran'])->latest()->get();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::with('kelas')->orderBy('nama_siswa')->get();
        $mapels = MataPelajaran::orderBy('nama_mapel')->get();
        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $mapel = MataPelajaran::findOrFail($validated['mata_pelajaran_id']);
        $nilaiAkhir = round(
            ($validated['nilai_tugas'] * 0.2) +
            ($validated['nilai_uts'] * 0.3) +
            ($validated['nilai_uas'] * 0.5),
            2
        );
        $status = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Remedial';

        Nilai::create([
            ...$validated,
            'nilai_akhir' => $nilaiAkhir,
            'status' => $status,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil disimpan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::with('kelas')->orderBy('nama_siswa')->get();
        $mapels = MataPelajaran::orderBy('nama_mapel')->get();
        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $mapel = MataPelajaran::findOrFail($validated['mata_pelajaran_id']);
        $nilaiAkhir = round(
            ($validated['nilai_tugas'] * 0.2) +
            ($validated['nilai_uts'] * 0.3) +
            ($validated['nilai_uas'] * 0.5),
            2
        );
        $status = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Remedial';

        $nilai->update([
            ...$validated,
            'nilai_akhir' => $nilaiAkhir,
            'status' => $status,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }
}