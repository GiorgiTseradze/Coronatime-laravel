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
    <body class="flex flex-col font-['inter'] w-full h-full">
        <div class="lg:w-full lg:h-full">
            
            <div class="flex flex-col justify-center items-center w-full">
                <img src="/assets/mail.png" class="w-[343px] h-[241px] mt-4"/>  
            </div>
             
            <div class="flex flex-col justify-center items-center w-full mt-10" >
                <h1 class="text-2xl font-black">Confirmation email</h1>
                <p class="text-base font-normal mt-2">click this button to verify your email</p>
            </div>
            <div class="flex justify-center w-full">
                <div class="h-14 mt-6 flex flex-col w-[343px] justify-center items-center font-black text-white text-base bg-green-500 rounded">
                    <button>
                        <a>VERIFY EMAIL</a>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
