<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400;500;700;900&display=swap');
        </style> 
        <title>Coronatime</title>
    </head>
    <body class="flex flex-col items-center font-['inter'] w-full h-full">
        <div class="grid lg:grid-cols-2">

            <div class="w-[343px] lg:w-[392px]">
                <div class="mt-6 w-full">
                    <img src="/assets/corona.png"/>
                </div>

                <div class="">
                    <div class="mt-11 lg:mt-[60px]">
                        <h2 class="font-black text-xl lg:text-2xl">Welcome back</h2>
                    </div>
                    <div>
                        <p class="mt-2 lg:mt-2 text-gray-400 text-base lgtext-xl">Welcome back! Please enter your details</p>
                    </div>
                    
                    <form method="POST" action="/login" class="mt-6">
                        @csrf
                        <div class="flex flex-col w-full text-sm lg:text-base"> 
                            <label for="username" class="font-bold">Username</label>
                            <input name="username" placeholder="Enter unique username or email" class="border-2 mt-2 pl-6 h-14">
                        </div>
                        <div class="flex flex-col w-full text-sm lg:text-base"> 
                            <label for="password" class="mt-4 font-bold">Password</label>
                            <input name="password" placeholder="Fill in password" class="border-2 mt-2 pl-6 h-14" >
                        </div>

                        <div class="flex mt-6">
                            <label for="remember"></label>
                            <input type="checkbox" name="remember">

                            <p class="ml-2 text-sm font-semibold">Remember this device</p>

                            <p class="ml-11 text-blue-600 font-semibold text-sm">Forgot password?</p>
                        </div>

                        <div class="h-14 mt-7 flex justify-center items-center font-black text-white text-base bg-green-500 rounded">
                            <button type="submit">LOG IN</button>
                        </div>
                    
                        <div class="flex justify-center mt-6">
                            <p class="text-gray-400 text-sm lg:text-base">Don't have an account?</p>
                            <p class="font-bold ml-2 text-sm lg:text-base">Sign up for free</p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="hidden lg:flex lg:w-[604px] lg:h-[900px]">
                <img src="/assets/vax.png" />
            </div>
        </div>
    </body>
</html>
