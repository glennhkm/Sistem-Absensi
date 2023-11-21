<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guru;
use App\Models\Siswa;
use App\Events\SiswaCreated;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Guru::create([
        //     'username' => 'absensi', 
        //     'password' => bcrypt('absensi')
        // ]);
        $siswa = Siswa::create([
            'nama_siswa' => 'Akhsania', 
            'NISN' => '2208107010050', 
            'tanggal_lahir' => '2003-04-30', 
            'jenis_kelamin' => 'perempuan'
        ]);
        event(new SiswaCreated($siswa));
    }
}
