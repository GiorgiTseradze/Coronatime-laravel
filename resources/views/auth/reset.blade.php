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

            <div class="w-[343px] lg:w-[392px]">
                <div class="flex lg:justify-center mt-6 lg:mt-10 w-full">
                    <img src="/assets/corona.png"/>
                </div>

                <div class="h-96">
                    <div class="flex justify-center mt-11 lg:mt-36">
                        <h2 class="font-black text-xl lg:text-2xl">Reset Password</h2>
                    </div>
                    
                    <form method="POST" action="/reset" class="mt-10 lg:mt-14">
                        @csrf

                        <div class="flex flex-col w-full text-sm lg:text-base"> 
                            <label for="email" class="font-bold">Email</label>
                            <input name="email" placeholder="Enter your email" class="border-2 mt-2 pl-6 h-14">
                        </div>

                        <div class="h-14 mt-80 lg:mt-14 flex justify-center items-center font-black text-white text-base bg-green-500 rounded">
                            <button type="submit">RESET PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>