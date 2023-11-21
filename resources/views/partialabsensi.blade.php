@foreach ($absensi as $item)
    <tr class=" h-[5vh]">
        <td class=" border border-black"> {{$loop->iteration}} </td>
        <td class=" border border-black"> {{$item->siswa->NISN}} </td>
        <td class=" border border-black"> {{ucwords($item->siswa->nama_siswa)}} </td>
        <td class=" border border-black"> {{ucwords($item->siswa->jenis_kelamin)}} </td>
        <td class="border border-black">
            <form id="form_{{ $item->id }}">
                @csrf
                <select name="status" id="status" class="text-[0.95rem] p-1 mb-[0.2rem] rounded-md w-20">
                    <option value="hadir" {{ $item->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ $item->status == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ $item->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpa" {{ $item->status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                </select>
            </form>
        </td>
    </tr>
    @endforeach
    @for ($i = count($absensi); $i < 20; $i++)
    <tr class=" h-[5vh]">
        <td class=" border border-black"></td>  
        <td class=" border border-black"></td>
        <td class=" border border-black"></td>
        <td class=" border border-black"></td>
        <td class="border border-black"></td>
    </tr>  
    @endfor