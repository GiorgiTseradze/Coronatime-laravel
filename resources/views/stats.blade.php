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
                    @endauth
                    <div class="hidden lg:block lg:ml-6">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                    </div>
                </div>

                <div class="font-black text-xl mt-12 w-full ml-4">
                    <h1 class="flex justify-center">Worldwide Statistics</h1>
                </div>

                <div class="flex justify-center mt-6 w-full ml-4">
                    <h2 class="">Worldwide</h2>
                    <h2 class="ml-6">By country</h2>
                </div>
                </div>
                <div><p>Search</p></div>


<div class="overflow-x-auto relative mt-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Location
                </th>
                <th scope="col" class="py-3 px-6">
                    New cases
                </th>
                <th scope="col" class="py-3 px-6">
                    Deaths
                </th>
                <th scope="col" class="py-3 px-6">
                    Recovered
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $stat)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $stat->country }}
                </th>
                <td class="py-4 px-6">
                    {{ $stat->cases }} 
                </td>
                <td class="py-4 px-6">
                    {{ $stat->death }}
                </td>
                <td class="py-4 px-6">
                    {{ $stat->recovered }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

               

        </div>
    </body>
</html>
