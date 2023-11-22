@extends('layout')

@section('title','Tambah Siswa')

@section('body')

<div class="flex h-[86vh] overflow-hidden w-screen justify-center items-center font-poppins">
    <div class="flex flex-col w-2/3 gap-12 shadow-md drop-shadow-lg shadow-zinc-400 rounded-md border  p-12 pt-14">
        <form action="/siswaa" method="POST" class="flex flex-col gap-12">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="nama_siswa" class="text-xl"> Nama </label>
                <input type="text" name="nama_siswa" id="nama_siswa" autocomplete="off" required class="text-sm focus:outline-none h-10 px-2 rounded-md bg-[#D9D9D9]" value="{{ old('nama_siswa') }}">
            </div>
            <div class="flex flex-col gap-2">
                <label for="noUpDown" class="text-xl"> NISN </label>
                <input type="number" name="NISN" id="noUpDown" required autocomplete="off" class="text-sm appearance-none focus:outline-none h-10 px-2 rounded-md bg-[#D9D9D9]" value="{{ old('NISN') }}">
                @if($errors->has('error'))
                    <div class="text-red-600 ml-[0.13rem] text-xs font-extralight font-poppins">
                        {{ $errors->first('error') }}
                    </div>
                @endif
            </div>
            <div class="flex items-center mt-5"> 
                <div class="flex flex-col gap-2 w-1/4">
                    <label for="tanggal_lahir" class="text-xl"> Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" required id="tanggal_lahir" class="text-sm h-10 px-2 rounded-md bg-[#D9D9D9]" value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="flex flex-col ml-auto gap-2"> 
                    <label for="jenis_kelamin" class="text-xl">Jenis Kelamin</label>
                    <div class="flex gap-4">
                        <div>
                            <input type="radio" name="jenis_kelamin" required id="laki-laki" value="laki-laki" class=" mr-1" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}>
                            <label for="laki-laki" class="text-sm">Laki-laki</label>
                        </div>
                        <div>
                            <input type="radio" name="jenis_kelamin" required id="perempuan" value="perempuan" class=" border border-black mr-1" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
                            <label for="perempuan" class="text-sm">Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="bg-white hover:bg-green-800 shadow-md drop-shadow-xl py-1 px-2 w-36 mx-auto rounded-md text-green-800 border border-green-800  hover:scale-105 duration-300 hover:text-white ">Tambahkan</button>
        </form>
        
    </div>
    @if(session('success'))
    <div class="fixed h-screen w-screen justify-center hidden duration-300 opacity-0 top-0 left-0 bg-black bg-opacity-25" id="addSuccess">
        <div class="bg-white rounded-md px-16 flex flex-col items-center h-24 justify-center gap-2 transition-transform duration-700 ease-out transform " id="addSuccessForm">
            <div class="text-black text-lg font-bold font-poppins ">
                {{ session('success') }} 
            </div>
            <button class="bg-green-600 rounded-md font-extralight text-white w-16 py-[0.1rem] hover:scale-110 duration-300" onclick="hideModal()">OK</button>
        </div>
    </div>
    @endif
</div>

<script>
    function hideModal(){
        document.getElementById('addSuccess').classList.remove('opacity-100');
        document.getElementById('addSuccessForm').classList.add('ease-in-out');
        document.getElementById('addSuccessForm').classList.remove('translate-y-20');
        setTimeout(() => {
            document.getElementById('addSuccess').classList.remove('flex');
            document.getElementById('addSuccess').classList.add('hidden');
        }, 500);
    }

    document.getElementById('addSuccess').classList.remove('hidden');
            document.getElementById('addSuccess').classList.add('flex');
            setTimeout(function () {
                document.getElementById('addSuccessForm').classList.add('translate-y-20');
                document.getElementById('addSuccess').classList.add('opacity-100');
            }, 50);
</script>




@endsection