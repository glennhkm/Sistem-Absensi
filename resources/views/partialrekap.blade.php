{{-- <table class="w-full text-center" id="printArea">
    <thead class=" text-[20px] bg-[#C6E9DC] sticky top-0">
        <tr class="border border-black">
            <th rowspan="2" class=" border border-black w-[3vw]">No</th>
            <th rowspan="2" class=" border border-black w-[23vw]">Nama</th>
            <th colspan="4" class=" border border-black">Jumlah Kehadiran</th>
            <th rowspan="2" class=" border border-black">Keterangan</th>
        </tr>
        <tr class="border border-black">
            <th class=" border border-black">Hadir</th>
            <th class=" border border-black">Sakit</th>
            <th class=" border border-black">Izin</th>
            <th class=" border border-black">Alpa</th>
        </tr>
    </thead>
    <tbody class=" text-[20px] bg-[#C6E9DC]"> --}}
        @foreach($result as $data)
            <tr class=" h-[5vh]">
                <td class=" border border-black" id="isiTable"> {{$loop->iteration}} </td>
                <td class=" border border-black" id="isiTable"> {{ucwords($data['nama_siswa'])}} </td>
                <td class=" border border-black" id="isiTable"> {{ $data['hadir']}} </td>
                <td class=" border border-black" id="isiTable"> {{ $data['sakit'] }} </td>
                <td class=" border border-black" id="isiTable"> {{ $data['izin']}} </td>
                <td class=" border border-black" id="isiTable"> {{ $data['alpa'] }} </td>
                <td class=" border border-black" id="isiTable"></td>
            </tr>
        @endforeach
        @for ($i = count($result); $i < 20; $i++)
        <tr class=" h-[5vh]">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
        </tr>   
        @endfor
    {{-- </tbody>
</table> --}}