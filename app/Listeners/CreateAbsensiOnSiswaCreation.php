<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use App\Models\Absensi;
use App\Events\SiswaCreated;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAbsensiOnSiswaCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SiswaCreated  $event
     * @return void
     */
    // public function handle(SiswaCreated $event)
    // {
    //     $siswa = $event->siswa;
    //     // $tanggalSekarang = now()->toDateString();

    //     // Buat baris data absensi untuk setiap hari dalam bulan ini
    //     for ($hari = 1; $hari <= now()->daysInMonth; $hari++) {
    //         Absensi::create([
    //             'id_siswa' => $siswa->id,
    //             'status' => 'hadir',
    //             'tanggal_absen' => now()->setDay($hari)->toDateString(),
    //         ]);
    //     }
    // }

    public function handle(SiswaCreated $event)
    {
        $client = new Client();
        $siswa = $event->siswa;
    
        $startDate = now()->firstOfMonth();
        $endDate = now()->addMonths(6)->endOfMonth();
    
        $apiUrls = [
            "https://api-harilibur.vercel.app/api?year=2023",
            "https://api-harilibur.vercel.app/api?year=2024",
        ];
    
        // $holidayUrl2023 = "https://api-harilibur.vercel.app/api?year=2023";
        // $holidayData2023 = json_decode(file_get_contents($holidayUrl2023), true);
    
        // $holidayUrl2024 = "https://api-harilibur.vercel.app/api?year=2024";
        // $holidayData2024 = json_decode(file_get_contents($holidayUrl2024), true);
    
        $holidays = [];
        foreach ($apiUrls as $apiUrl) {
            $response = Http::get($apiUrl);
            if ($response->successful()) {
                $holidayData = $response->json();
                foreach ($holidayData as $holiday) {
                    if ($holiday['is_national_holiday']) {
                        // Konversi tanggal dari API ke objek Carbon
                        $holidayDate = \Carbon\Carbon::createFromFormat('Y-m-d', $holiday['holiday_date']);
                    
                        // Simpan tanggal libur dalam format Y-m-d
                        $holidays[] = $holidayDate->toDateString();
                    }
                }
            }
        }
    
        // Looping tanggal
        while ($startDate <= $endDate) {
            $formattedStartDate = $startDate->toDateString();
        
            // Periksa apakah bukan hari Minggu dan tidak ada dalam array libur
            if ($startDate->dayOfWeek !== 0 && !in_array($formattedStartDate, $holidays)) {
                Absensi::create([
                    'id_siswa' => $siswa->id,
                    'status' => 'hadir',
                    'tanggal_absen' => $formattedStartDate,
                ]);
            }
        
            $startDate->addDay();
        }
    }

}
