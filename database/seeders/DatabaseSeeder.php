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
        $siswa1 = Siswa::create([
            'nama_siswa' => 'Glenn Hakim', 
            'NISN' => '2208107010072', 
            'tanggal_lahir' => '2004-07-26', 
            'jenis_kelamin' => 'laki-laki'
        ]);
        $siswa2 = Siswa::create([
            'nama_siswa' => 'farhanul khair', 
            'NISN' => '2208107010076', 
            'tanggal_lahir' => '2004-09-19', 
            'jenis_kelamin' => 'laki-laki'
        ]);
        $siswa3 = Siswa::create([
            'nama_siswa' => 'alfi zamriza', 
            'NISN' => '2208107010085', 
            'tanggal_lahir' => '2003-10-11', 
            'jenis_kelamin' => 'laki-laki'
        ]);
        $siswa4 = Siswa::create([
            'nama_siswa' => 'akhsania', 
            'NISN' => '2208107010050', 
            'tanggal_lahir' => '2004-04-21', 
            'jenis_kelamin' => 'perempuan'
        ]);
        $siswa5 = Siswa::create([
            'nama_siswa' => 'tiara', 
            'NISN' => '2208107010011', 
            'tanggal_lahir' => '2004-02-08', 
            'jenis_kelamin' => 'perempuan'
        ]);

        event(new SiswaCreated($siswa1));
        event(new SiswaCreated($siswa2));
        event(new SiswaCreated($siswa3));
        event(new SiswaCreated($siswa4));
        event(new SiswaCreated($siswa5));
    }
}
