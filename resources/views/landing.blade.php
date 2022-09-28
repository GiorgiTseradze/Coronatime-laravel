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
    <body class="flex flex-col justify-center items-center font-['inter'] w-full h-full">

        <div class="w-[375px] lg:w-[1440px] lg:h-[1112px]">
            <div class="flex itmes-center justify-center flex-wrap mt-6 w-full">
                <div class="ml-4">
                    <a href="/"><img src="/assets/corona.png"/></a>
                </div>

                <div class="flex items-center w-max lg:ml-[769px]">
                    <p class="ml-14">English</p>
                    <div>
                        <img class="max-w-3 max-h-2 ml-2" src="/assets/tick.svg" />
                    </div>
                    <div>
                        <img class="ml-10 lg:hidden"src="/assets/menu.svg" />
                    </div>
                    @auth
                    <div class="hidden lg:block lg:ml-12">
                        <p class="font-black">{{ auth()->user()->username }}</p>
                    </div>
                   
                    <div class="hidden lg:block lg:ml-6">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                    </div>
                    @endauth
                </div>
                
                <div class="font-black text-xl mt-12 w-full ml-4">
                    <h1 class="flex justify-center">Worldwide Statistics</h1>
                </div>

                <div class="flex justify-center mt-6 lg:w-[1224px] ml-4 border-b-2">
                        <div class="border-b-4 border-black">
                            <h2 class="mb-2 font-black"><a href="/">Worldwide</a></h2>
                        </div>
                        <div>
                            <h2 class="mb-2 ml-6"><a href="/stats">By country</a></h2>
                        </div>
                </div>

                <div class="ml-4 lg:ml-26 mt-10 w-[343px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-purple-100">
                    <div class="flex flex-col items-center mt-6">
                        <img src="/assets/purple.svg" />
                        <p class="mt-4 font-medium text-base">New cases</p>
                        <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->cases }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <div class="ml-4 mt-4 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-green-100">
                        <div class="flex flex-col items-center mt-4">
                            <img src="/assets/green.svg" />
                            <p class="mt-4 font-medium text-base">Recovered</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->recovered }}</p>
                        </div>
                    </div>
                    <div class="ml-4 mt-4 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-yellow-100">
                        <div class="flex flex-col items-center mt-4">
                            <img src="/assets/yellow.svg" />
                            <p class="mt-4 font-medium text-base">Death</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->death }}</p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>
