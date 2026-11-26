<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $xiRpl1 = Kelas::create([
            'nama_kelas' => 'XI RPL 1',
            'tingkat' => 'XI',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'tahun_ajaran' => '2026/2027',
        ]);

        $xiRpl2 = Kelas::create([
            'nama_kelas' => 'XI RPL 2',
            'tingkat' => 'XI',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'tahun_ajaran' => '2026/2027',
        ]);

        Kelas::create([
            'nama_kelas' => 'XII TKJ 1',
            'tingkat' => 'XII',
            'jurusan' => 'Teknik Komputer & Jaringan',
            'tahun_ajaran' => '2026/2027',
        ]);

        $budi = Siswa::create([
            'nis' => '2026001',
            'nama_siswa' => 'Budi Santoso',
            'jenis_kelamin' => 'Laki-Laki',
            'kelas_id' => $xiRpl1->id,
            'no_hp' => '081234567890',
        ]);

        $siti = Siswa::create([
            'nis' => '2026002',
            'nama_siswa' => 'Siti Nurhaliza',
            'jenis_kelamin' => 'Perempuan',
            'kelas_id' => $xiRpl1->id,
            'no_hp' => '081987654321',
        ]);

        Siswa::create([
            'nis' => '2026003',
            'nama_siswa' => 'Rizky Pratama',
            'jenis_kelamin' => 'Laki-Laki',
            'kelas_id' => $xiRpl2->id,
            'no_hp' => '082112233445',
        ]);

        Guru::create([
            'nip' => '198501152010011001',
            'nama_guru' => 'Drs. Ahmad Dahlan, M.Pd',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'ahmad.dahlan@sekolah.sch.id',
            'no_hp' => '081399887766',
        ]);

        Guru::create([
            'nip' => '199003202015022002',
            'nama_guru' => 'Dewi Sartika, S.Kom',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'dewi.sartika@sekolah.sch.id',
            'no_hp' => '081544332211',
        ]);

        $pwpb = MataPelajaran::create([
            'kode_mapel' => 'MP-PWPB',
            'nama_mapel' => 'Pemrograman Web & Perangkat Bergerak',
            'kkm' => 75,
        ]);

        MataPelajaran::create([
            'kode_mapel' => 'MP-PBO',
            'nama_mapel' => 'Pemrograman Berorientasi Objek',
            'kkm' => 75,
        ]);

        $basdat = MataPelajaran::create([
            'kode_mapel' => 'MP-BASDAT',
            'nama_mapel' => 'Basis Data',
            'kkm' => 78,
        ]);

        Nilai::create([
            'siswa_id' => $budi->id,
            'mata_pelajaran_id' => $pwpb->id,
            'nilai_tugas' => 85.00,
            'nilai_uts' => 80.00,
            'nilai_uas' => 90.00,
            'nilai_akhir' => 85.50,
            'status' => 'Lulus',
        ]);

        Nilai::create([
            'siswa_id' => $budi->id,
            'mata_pelajaran_id' => $basdat->id,
            'nilai_tugas' => 90.00,
            'nilai_uts' => 88.00,
            'nilai_uas' => 92.00,
            'nilai_akhir' => 90.20,
            'status' => 'Lulus',
        ]);

        Nilai::create([
            'siswa_id' => $siti->id,
            'mata_pelajaran_id' => $pwpb->id,
            'nilai_tugas' => 80.00,
            'nilai_uts' => 76.00,
            'nilai_uas' => 100.00,
            'nilai_akhir' => 86.80,
            'status' => 'Lulus',
        ]);
    }
}