<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Events\SiswaCreated;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', ['siswa' => $siswa]);
    }

    public function create(){

        return view('siswa');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_siswa' => 'required',
                'NISN' => 'required|unique:siswa,NISN',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required'
            ]);

            $siswa = Siswa::create($validatedData);

            if ($siswa) {
                event(new SiswaCreated($siswa));
                return redirect('/siswaa')->with('success', ucwords($siswa->nama_siswa) . ' berhasil ditambahkan.');
            } else {                                                                                                                        
                // Handle case when creating Siswa fails
                return redirect('/siswaa')->with('error', 'Gagal menambahkan siswa.');
            }
        } catch (\Exception $e) {   
            // Handle other exceptions, log, or return an error response
            return redirect('/siswaa')
                                ->withInput($request->only(['nama_siswa', 'NISN', 'tanggal_lahir', 'jenis_kelamin']))
                                ->withErrors(['error' => 'NISN sudah tersedia.']);
        }
    }   


}
