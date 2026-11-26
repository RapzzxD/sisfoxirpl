<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_kelas' => Kelas::count(),
            'total_siswa' => Siswa::count(),
            'total_guru' => Guru::count(),
            'total_mapel' => MataPelajaran::count(),
            'rata_rata_nilai' => round((float) Nilai::avg('nilai_akhir'), 2),
        ];

        $nilaiTerbaru = Nilai::with(['siswa.kelas', 'mataPelajaran'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'nilaiTerbaru'));
    }
}