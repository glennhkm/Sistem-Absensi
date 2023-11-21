<?php

namespace App\Listeners;

use App\Models\Absensi;
use App\Events\SiswaCreated;
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
    public function handle(SiswaCreated $event)
    {
        $siswa = $event->siswa;
        // $tanggalSekarang = now()->toDateString();

        // Buat baris data absensi untuk setiap hari dalam bulan ini
        for ($hari = 1; $hari <= now()->daysInMonth; $hari++) {
            Absensi::create([
                'id_siswa' => $siswa->id,
                'status' => 'hadir',
                'tanggal_absen' => now()->setDay($hari)->toDateString(),
            ]);
        }
    }
}
