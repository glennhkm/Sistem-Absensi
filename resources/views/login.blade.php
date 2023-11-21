<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login Page</title>
</head>
<body >
    <div class=" w-screen h-screen clear-both">
        <div class=" w-[50%] h-full bg-[#4F826F] float-left">

        </div>
        <div class=" w-[50%] h-full float-right">
            <ul class=" text-[#4F826F] font-light text-[18px] text-right mr-[50px] mt-[25px]">
                <li class=" inline-block mr-[25px] hover:scale-[1.05] duration-[0.3s]"><a href="" >About Us</a></li>
                <li class=" inline-block hover:scale-[1.05] duration-[0.3s]"><a href="" ">Contact</a></li>
            </ul>

            <div class=" w-[90%] h-[68] text-center mt-[50px] ml-[38px] pb-[30px] border-b-[2px] border-[#4F826F]">
                <h1 class=" font-semibold text-[50px] tracking-[7px]">Welcome to <span class=" text-[#4F826F]">AyoHadir!</span></h1>
                <p class=" font-light text-[17px]">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>

            <div class=" ml-[160px] mt-[60px]">
                <form action="" method="POST">
                    @csrf
                    <div class=" ">
                        <label for="username" class=" font-normal text-[15px] block mb-[8px] ml-[10px]">User Name</label>
                        <input id="username" name="username" type="text" required autocomplete="off" class="mb-[40px] w-[431px] h-[40px] rounded-[10px] border border-[#4F826F] focus:outline-[#4F826F] px-[5px]">
                    </div>
                    <div>
                        <label for="password" class=" font-normal text-[15px] block mb-[8px] ml-[10px]">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="off" class="mb-[80px] w-[431px] h-[40px] rounded-[10px] border border-[#4F826F] focus:outline-[#4F826F] px-[5px]">
                    </div>
                    <div class="mb-[10px]">
                        <input type="checkbox" id="remember">
                        <label for="remember" class=" text-[#707070]">Remember Me</label>
                    </div>
                    
                    <div>
                        {{-- <a href="/main"> --}}
                            <button class=" w-[431px] h-[50px] rounded-[10px] bg-[#4F826F] font-semibold text-[20px] text-white hover:scale-[1.04] duration-[0.4s]">Login</button>
                        {{-- </a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>