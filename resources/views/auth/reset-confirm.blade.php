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

            <div>
                <div class="w-[343px] lg:w-[375px]">
                    <div class="flex lg:justify-center ml-4 lg:ml-0 mt-6 lg:mt-8 w-full">
                        <img src="/assets/corona.png"/>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center h-96 lg:h-[600px] w-full">
                    <img src="/assets/checked.png"/>
                    <p class="text-base lg:text-lg mt-4">We have sent you a confirmation email</p>
                </div>
            </div>
    </body>
</html>
