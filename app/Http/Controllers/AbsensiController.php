<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(){
        $absensi = Absensi::with('siswa')
                ->whereDate('tanggal_absen', now())
                ->get();
        $data = [];
        
        foreach ($absensi as $absen) {
            $data[] = [
                'id' => $absen->id,
                'nama_siswa' => $absen->siswa->nama_siswa,
                'nisn' => $absen->siswa->NISN,
                'jenis_kelamin' => $absen->siswa->jenis_kelamin,
                'status' => $absen->status
            ];
        }

        usort($data, function ($a, $b) {
            return $a['nisn'] - $b['nisn'];
        });

        return view('absensi', ['data' => $data]);
    }


    public function showMonthlyReport(Request $request)
    {
        // Validasi input bulan
        $request->validate([
            'bulan' => 'date_format:Y-m',
        ]);
    
        $bulan = date('m', strtotime($request->bulan));
        $tahun = date('Y', strtotime($request->bulan));
    
        // Ambil data rekap absen per bulan
        $rekapBulanan = Absensi::select('siswa.nisn', 'siswa.nama_siswa', 'absensi.status', DB::raw('COUNT(*) as count'))
                    ->join('siswa', 'siswa.id', '=', 'absensi.id_siswa')
                    ->whereYear('absensi.tanggal_absen', $tahun)
                    ->whereMonth('absensi.tanggal_absen', $bulan)
                    ->groupBy('siswa.nisn', 'siswa.nama_siswa', 'absensi.status')
                    ->get();
    
        // Proses data rekap untuk menyatukan per NISN dan status
        $result = [];
        foreach ($rekapBulanan as $data) {
            $nisn = $data->nisn;
            $status = $data->status;
    
            // Jika NISN belum ada di result, tambahkan
            if (!isset($result[$nisn])) {
                $result[$nisn] = [
                    'nisn' => $nisn,
                    'nama_siswa' => $data->nama_siswa,
                    'hadir' => 0,
                    'sakit' => 0,
                    'izin' => 0,
                    'alpa' => 0,                                               
                ];
            }
    
            // Tambahkan jumlah status sesuai data yang ditemukan
            $result[$nisn][$status] += $data->count;
        }
    
        usort($result, function ($a, $b) {
            return strcmp(strtolower($a['nama_siswa']), strtolower($b['nama_siswa']));
        });
        // Ubah array associatif menjadi array indeks
        // $result = array_values($result);
    
        // Tampilkan halaman rekap absen per bulan dengan data yang telah diambil
        return view('partialrekap', compact('result'))->render();
    }
    

    public function rekap()
    {
        // Ambil data rekap absen per bulan
        $rekapBulanan = Absensi::select('siswa.nisn', 'siswa.nama_siswa', 'absensi.status', DB::raw('COUNT(*) as count'))
                    ->join('siswa', 'siswa.id', '=', 'absensi.id_siswa')
                    ->whereYear('absensi.tanggal_absen', date('Y'))
                    ->whereMonth('absensi.tanggal_absen', date('m'))
                    ->groupBy('siswa.nisn', 'siswa.nama_siswa', 'absensi.status')
                    ->get();
        $result = [];
        foreach ($rekapBulanan as $data) {
            $nisn = $data->nisn;
            $status = $data->status;
        
            // Jika NISN belum ada di result, tambahkan
            if (!isset($result[$nisn])) {
                $result[$nisn] = [
                    'nisn' => $nisn,
                    'nama_siswa' => $data->nama_siswa,
                    'hadir' => 0,
                    'sakit' => 0,
                    'izin' => 0,
                    'alpa' => 0,                                               
                ];
            }
        
            // Tambahkan jumlah status sesuai data yang ditemukan
            $result[$nisn][$status] += $data->count;
        }
    
        // Ubah array associatif menjadi array indeks
        usort($result, function ($a, $b) {
            return strcmp(strtolower($a['nama_siswa']), strtolower($b['nama_siswa']));
        });
        //  $result = array_values($result);

        // Tampilkan halaman rekap absen per bulan dengan data yang telah diambil
        return view('rekap', compact('result'));
    }


    public function showByDate(Request $request){

        $tanggal = $request->inputTanggal;

        // Ambil data absensi berdasarkan tanggal
        $absensi = Absensi::with('siswa')
            ->whereDate('tanggal_absen', $tanggal)
            ->get();

        $data = [];
        
        foreach ($absensi as $absen) {
            $data[] = [
                'id' => $absen->id,
                'nama_siswa' => $absen->siswa->nama_siswa,
                'nisn' => $absen->siswa->NISN,
                'jenis_kelamin' => $absen->siswa->jenis_kelamin,
                'status' => $absen->status
            ];
        }

        usort($data, function ($a, $b) {
            return $a['nisn'] - $b['nisn'];
        });
        
        $html = view('partialabsensi', compact('data'))->render();
        return response()->json(['html' => $html]);
    }


    public function update(Request $request, $id){

        $absensi = Absensi::findOrFail($id);
        
        $absensi->status = $request->status;
        
        $absensi->save();
        
        return response()->json([
          'message' => 'mantap'
        ]);
    }
}
