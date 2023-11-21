@extends('layout')

@section('title','Rekap Absen')

@section('body')
    <div>
        <div class=" clear-both mt-[25px] h-[50px]">
            <div class=" float-left ml-[7.4vw]">
                <h1 class=" text-[4.5vh] font-bold text-[#4F826F]">REKAP ABSEN</h1>
            </div>
            <div class=" float-right mr-[7.4vw] mt-[1.6vh]">
                <form action="{{ route('rekap.bulanan') }}" method="GET" id="formBulan">
                    @csrf
                    <label for="inputBulan" class=" mr-[1vw] text-[20px]">Bulan :</label>
                    <input type="month" id="inputBulan" class=" pl-[0.5vw] border-[0.1vh] border-black" name="bulan" required value="{{Carbon\Carbon::now()->format('Y-m')}}" >
                    {{-- <button type="submit" class="bg-[#4F826F] font-semibold w-full h-full text-white rounded-[10px] hover:scale-[1.05] duration-[0.5s]">Ambil Rekap Absen</button> --}}
                </form>
            </div>
        </div>

        <div class=" w-[85%] h-[580px]  mx-auto overflow-scroll">
            <div id="printArea">

                <table class="w-full text-center" >
                    <thead class=" text-[20px] bg-[#C6E9DC] sticky top-0">
                        <tr class="border border-black">
                        <th rowspan="2" class=" border border-black w-[3vw]" id="headIsi">No</th>
                        <th rowspan="2" class=" border border-black w-[23vw]" id="headIsi">Nama</th>
                        <th colspan="4" class=" border border-black" id="headIsi">Jumlah Kehadiran</th>
                        <th rowspan="2" class=" border border-black" id="headIsi">Keterangan</th>
                    </tr>
                    <tr class="border border-black">
                        <th class=" border border-black" id="headIsi">Hadir</th>
                        <th class=" border border-black" id="headIsi">Sakit</th>
                        <th class=" border border-black" id="headIsi">Izin</th>
                        <th class=" border border-black" id="headIsi">Alpa</th>
                    </tr>
                </thead>
                <tbody class=" text-[20px] bg-[#C6E9DC]" id="bodyTable">
                    @include('partialrekap')
                </tbody>
            </table>
        </div>
        </div>

        <div class=" w-screen h-[40px] clear-right">
            <div class="w-[250px] h-full float-right mt-[5vh] mr-[7.4vw]">
                <button class=" bg-[#4F826F] font-semibold w-full h-full text-white rounded-[10px] hover:scale-[1.05] duration-[0.5s]" onclick="printRekap()">Ambil Rekap Absen</button>
            </div>
        </div>
    </div>
    
 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // var bulanTahun;
        var formData;
        $(document).ready(function () {
            // var date = $('#inputBulan').val();
            // bulanTahun = new Date(date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long' });
            // console.log(tgl.toLocaleDateString('id-ID', { year: 'numeric', month: 'long' }));
            $('#formBulan').on('change', function() {
                var form = $(this);
                form.submit();
            });
            $('#formBulan').on('submit', function (e) {
                e.preventDefault(); // Mencegah form untuk melakukan submit default
                
                formData = $(this).serialize(); // Mengambil data form
                // Mengirim request AJAX ke server
                $.ajax({
                    type: 'get',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function (response) {
                        // Mengganti isi tabel dengan data yang baru
                        // $('.w-full.text-center').html(response);
                        $('tbody').html(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
        
        function printRekap(){
            var originals = document.body.innerHTML;
            var bodyTable = document.getElementById('bodyTable');
            var headIsi = document.querySelectorAll('#headIsi');
            // headIsi.classList.add('font-thin');
            headIsi.forEach(element => {
                element.classList.add('font-medium');
            });
            bodyTable.classList.remove('bg-[#C6E9DC]');
            var printArea = document.getElementById('printArea').innerHTML;
            // bodyTable.classList.add('bg-white');

            document.body.innerHTML = `
            <div class="flex flex-col gap-12 justify-center items-center">
                <div class="text-black text-lg font-poppins font-bold">
                    Rekapitulasi    
                </div>
                <div class="w-[92%]">
                    ${printArea}
                </div>
            </div>`;
        
            window.print();
            document.body.innerHTML = `${originals}`;
            location.reload(true);
        }
        </script>
@endsection