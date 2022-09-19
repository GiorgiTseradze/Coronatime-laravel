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

        <div class="w-[375px] lg:w-full lg:h-full">
            <div class="flex itmes-center justify-center flex-wrap mt-6 w-full">
                <div class="ml-4">
                    <img src="/assets/corona.png"/>
                </div>

                <div class="flex items-center w-max ">
                    <p class="ml-14">English</p>
                    <div>
                        <img class="max-w-3 max-h-2 ml-2" src="/assets/tick.svg" />
                    </div>
                    <div>
                        <img class="ml-10"src="/assets/menu.svg" />
                    </div>
                </div>

                <div class="font-black text-xl mt-12 w-full ml-4">
                    <h1 class="flex justify-center">Worldwide Statistics</h1>
                </div>

                <div class="flex justify-center mt-6 w-full ml-4">
                    <h2 class="">Worldwide</h2>
                    <h2 class="ml-6">By country</h2>
                </div>

                
                <div class="ml-4 lg:ml-26 mt-10 w-[343px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-purple-100">
                    <div class="flex flex-col items-center mt-6">
                        <img src="/assets/purple.svg" />
                        <p class="mt-4 font-medium text-base">New cases</p>
                        <p class="mt-4 text-blue-700 font-black text-2xl">123,123</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-3">
                    <div class="ml-4 mt-4 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-green-100">
                        <div class="flex flex-col items-center mt-4">
                            <img src="/assets/green.svg" />
                            <p class="mt-4 font-medium text-base">Recovered</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">321,321</p>
                        </div>
                    </div>
                    <div class="ml-4 mt-4 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-yellow-100">
                        <div class="flex flex-col items-center mt-4">
                            <img src="/assets/yellow.svg" />
                            <p class="mt-4 font-medium text-base">Death</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">213,213</p>
                        </div>
                    </div>
                </div>

               
            </div>

        </div>
    </body>
</html>
