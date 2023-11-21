<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <div class="w-screen h-[14vh] bg-[#4F826F] clear-both">
        <div class=" float-left ml-[50px] mt-[70px]">
            <button id="tombolMenu">
                <img src="{{url('assets/img/navbar.png')}}" alt="nav" class=" w-[36px]">
            </button>
        </div>

        <div class=" float-right mr-[50px] mt-[55px] w-[250px] h-[35px]">
            <div class=" inline-block float-left">
                <img src="{{url('assets/img/icon.png')}}" alt="icon" class=" w-[44px] mt-[2px] invert-[100]">
            </div>
            <div class=" float-right w-[188px] h-[35px] bg-white rounded-[45px] inline-block mt-[6px]"></div>
        </div>
    </div>
    <div class="hidden z-[1000] h-[86vh] w-[288px] bg-[#4F826F] fixed" id="menu">
        <div class=" text-center flex flex-col gap-[20px]">
            <div>
                <a href="/absensi">
                    <button class="w-[90%] h-[48px] hover:bg-[#C6E9DC] duration-[0.4s] rounded-[10px] clear-both">
                        <img src="{{url('assets/img/absensi.png')}}" alt="" class=" w-[44px] inline-block float-left ml-[32.5px] mt-[4px]">
                        <p class=" inline-block text-[#252525] text-[22px] font-bold float-right leading-[48px] mr-[70px]">Absensi</p>
                    </button>
                </a>
            </div>
            <div >
                <a href="/rekapabsen">
                    <button class=" w-[90%] h-[48px] hover:bg-[#C6E9DC] duration-[0.4s] rounded-[10px] clear-both ">
                        <img src="{{url('assets/img/ambil-rekap.png')}}" alt="" class=" w-[44px] inline-block float-left ml-[32.5px] mt-[-4px]">
                        <p class=" inline-block text-[#252525] text-[22px] font-bold float-right leading-[48px] mr-[20px]">Ambil Rekap</p>
                    </button>
                </a>
            </div>
            <div>
                <a href="/logout">
                    <button class=" w-[90%] h-[48px] hover:bg-[#C6E9DC] duration-[0.4s] rounded-[10px] clear-both">
                        <img src="{{url('assets/img/logout.png')}}" alt="" class=" w-[44px] inline-block float-left ml-[32.5px]">
                        <p class="inline-block text-[#252525] text-[22px] font-bold float-right leading-[48px] mr-[73px]">Logout</p>
                    </button>
                </a>
            </div>
        </div>
    </div>
</head>
<body>
    @yield('body')
    <script src="{{asset('src/index.js')}}"></script>
</body>
</html>