@extends('layout')

@section('title','Absensi')
@section('body')
    <div class=" h-full w-screen overflow-hidden">

        <div class=" clear-both mt-[25px] h-[50px]">
            <div class=" float-left ml-[7.4vw]">
                <h1 class=" text-[4.5vh] font-bold text-[#4F826F]">ABSENSI</h1>
            </div>

            <div class=" float-right mr-[7.4vw] mt-[1.6vh]">
                <label for="inputTanggal" class=" mr-[1vw] text-[20px]">Tanggal :</label>
                <input type="date" id="inputTanggal" name="inputTanggal" class=" pl-[0.5vw] border-[0.1vh] border-black" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
        </div>
        <div class=" w-[85%] h-[60vh] mt-[3vh]  mx-auto overflow-scroll">
            <table class="w-full text-center">
                <thead class=" text-[20px] bg-[#C6E9DC] sticky top-0">
                    <tr class="border border-black h-[6vh]">
                        <th class=" border border-black w-[3vw]">No</th>
                        <th class=" border border-black w-[15vw]">NISN</th>
                        <th class=" border border-black w-[23vw]">Nama</th>
                        <th class=" border border-black w-[17vw]">Jenis Kelamin</th>
                        <th class=" border border-black">Status</th>
                    </tr>
                    
                </thead>
                <tbody class=" text-[20px] bg-[#C6E9DC]">
                    @include('partialabsensi')
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        
    $(document).ready(function() {
        // Menambahkan event listener untuk perubahan tanggal
        $('#inputTanggal').on('change', function() {
            // Mengambil tanggal yang dipilih
            var selectedDate = $(this).val();

            // Mengirim request AJAX untuk mengambil data absensi berdasarkan tanggal
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/absensi/showByDate',
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    inputTanggal: selectedDate
                },
                success: function(response) {
                    // Menyisipkan HTML hasil dari request ke dalam tbody
                    $('tbody').html(response.html);
                    $('select[name="status"]').on('change', function() {
        
                        var id_absensi = $(this).closest('form').attr('id').split('_')[1];
                        var status = $(this).val();

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/absensi/' + id_absensi,
                            method: 'PATCH',
                            data: {
                                _token: "{{ csrf_token() }}",
                                status: status
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    });
                }
            });
        });

        // Menambahkan event listener untuk select[name="status"]
        $('select[name="status"]').on('change', function() {
            // ...

            var id_absensi = $(this).closest('form').attr('id').split('_')[1];
            var status = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/absensi/' + id_absensi,
                method: 'PATCH',
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });

    </script>
    
    
@endsection