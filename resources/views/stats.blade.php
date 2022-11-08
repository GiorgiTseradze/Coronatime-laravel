<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400;500;700;900&display=swap');
        </style> 
        <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <title>Coronatime</title>
    </head>
    <body class="flex flex-col justify-center items-center font-['inter'] w-full h-full overflow-hidden">

        <div class="flex flex-col w-[23.4rem] lg:w-[90rem] lg:h-[69.5rem]">
            <div class="flex itmes-center flex-wrap mt-6 w-full">
                <div class="ml-4">
                    <a href="/"><img src="/assets/corona.png"/></a>
                </div>
                
                <div class="flex items-center w-max lg:ml-[48rem] ml-4 h-10">

                    <div class="flex justify-center">
                        <div
                            x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }

                                    this.$refs.button.focus()

                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (! this.open) return

                                    this.open = false

                                    focusAfter && focusAfter.focus()
                                }
                            }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                            class="w-25 relative"
                        >
                            <!-- Button -->
                            <button
                                x-ref="button"
                                x-on:click="toggle()"
                                :aria-expanded="open"
                                :aria-controls="$id('dropdown-button')"
                                type="button"
                                class="flex items-center gap-2 bg-white px-5 py-2.5 rounded"
                            >
                                {{__('texts.english')}}

                                <!-- Heroicon: chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Panel -->
                            <div
                                x-ref="panel"
                                x-show="open"
                                x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)"
                                :id="$id('dropdown-button')"
                                style="display: none;"
                                class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                            >
                                <a href='/change-locale/en' class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    {{__('texts.english')}}
                                </a>

                                <a href='/change-locale/ka' class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    {{__('texts.georgian')}}
                                </a>

                            </div>
                        </div>
                    </div>
                    
                    @auth
                    <div class="hidden lg:block lg:ml-12">
                        <p class="font-black">{{ auth()->user()->username }}</p>
                    </div>
                    @endauth
                    <div class="hidden lg:block lg:ml-6">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit">{{__('user.log_out')}}</button>
                        </form>
                    </div>
                    <div class="flex items-center lg:hidden w-max lg:ml-[48rem] h-10">

                    {{-- logout for mobile --}}

                        <div class="flex justify-center">
                            <div
                                x-data="{
                                    open: false,
                                    toggle() {
                                        if (this.open) {
                                            return this.close()
                                        }
    
                                        this.$refs.button.focus()
    
                                        this.open = true
                                    },
                                    close(focusAfter) {
                                        if (! this.open) return
    
                                        this.open = false
    
                                        focusAfter && focusAfter.focus()
                                    }
                                }"
                                x-on:keydown.escape.prevent.stop="close($refs.button)"
                                x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                x-id="['dropdown-button']"
                                class="w-25 relative"
                            >
                                <!-- Button -->
                                <button
                                    x-ref="button"
                                    x-on:click="toggle()"
                                    :aria-expanded="open"
                                    :aria-controls="$id('dropdown-button')"
                                    type="button"
                                    class="flex items-center gap-2 bg-white py-2.5 rounded"
                                >
    
                                    <!-- Heroicon: chevron-down -->
                                    <div>
                                        <img class="lg:ml-10 ml-3 lg:hidden" src="/assets/menu.svg" />
                                    </div>
                                </button>
    
                                <!-- Panel -->
                                <div
                                    x-ref="panel"
                                    x-show="open"
                                    x-transition.origin.top.left
                                    x-on:click.outside="close($refs.button)"
                                    :id="$id('dropdown-button')"
                                    style="display: none;"
                                    class="absolute left-0 mt-2 rounded-md bg-white"
                                >
                                <div class="text-xs">
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit">{{__('user.log_out')}}</button>
                                    </form>
                                </div>
    
                                </div>
                            </div>
                        </div>
                        
                        @auth
                        <div class="hidden lg:block">
                            <p class="font-black">{{ auth()->user()->username }}</p>
                        </div>
                        @endauth
                        <div class="hidden lg:block lg:ml-6">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit">{{__('user.log_out')}}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="font-black text-xl mt-12 w-full ml-4">
                    <h1 class="lg:justify-start flex ">{{__('texts.statistics_by_country')}}</h1>
                </div>

                <div class="justify-start flex mt-6 lg:w-[76.5rem] ml-4 border-b-2">
                    <div>
                        <h2 class="mb-2"><a href="/">{{__('texts.worldwide')}}</a></h2>
                    </div>
                    <div class="border-b-4 border-black ml-6">
                        <h2 class="mb-2 font-black"><a href="/stats">{{__('texts.by_country')}}</a></h2>
                    </div>
                   
                </div>
            </div>
                
            <div class="flex items-center mt-6 lg:ml-4 w-64 lg:w-72 lg:h-[3rem] lg:border rounded">
                <div class="flex">
                <img src="/assets/search.svg" class="ml-6 lg-ml:6 lg-h-[1.1rem]"/>
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="{{__('texts.search_by_country')}}" class="ml-2 w-52 outline-none">
                </form>
            </div>
        </div>

            
            <div class="flex lg:justify-center ml-4 w-96 lg:w-[76.5rem]  mt-10 h-[25.8rem] lg:h-[37.5rem]">
                <div class="overflow-x-hidden">
                <table class="text-sm text-left text-gray-500 dark:text-gray-400 w-[23.4rem] lg:w-[76.5rem] overflow-y-auto">
                    <thead class="lg:w-[76.5rem] text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="flex w-20">
                            <th scope="col" class="flex items-center w-14 py-3 lg:px-6">
                                    <div class="flex">
                                        <p>{{__('texts.location')}}</p>
                                        <div class="flex flex-col lg:ml-2 w-10 ml-1 justify-center">
                                            <a href="{{ route('stats') . "?column=country&order=asc&search=".request('search') }}">
                                                <div>
                                                    <img src="/assets/up.svg" />
                                                </div>
                                            </a>
                                            <a href="{{ route('stats') . "?column=country&order=desc&search=".request('search') }}">
                                                <div>
                                                    <img src="/assets/down.svg" />
                                                </div>
                                            </a>
                                        </div>
                                 
                                </div>
                            </th>
                            <th scope="col" class="flex items-center w-22 py-3 ml-10 lg:ml-36 lg:px-6">
                                <div class="flex w-[5.5rem]">
                                    <p>{{__('texts.new_cases')}}</p>
                                    <div class="flex flex-col ml-1 items-center justify-center">
                                        <a href="{{ route('stats') . "?column=cases&order=asc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/up.svg" />
                                            </div>
                                        </a>
                                        <a href="{{ route('stats') . "?column=cases&order=desc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/down.svg" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="flex items-center py-3 w-24 lg:ml-36">
                                <div class="flex w-16">
                                    <p class="block lg:hidden">{{__('texts.dea_ths')}}</p>  
                                    <p class="hidden lg:block">{{__('texts.deaths')}}</p>
                                    <div class="flex flex-col ml-1 lg:ml-2 items-center justify-center">
                                        <a href="{{ route('stats') . "?column=death&order=asc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/up.svg" />
                                            </div>
                                        </a>
                                        <a href="{{ route('stats') . "?column=death&order=desc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/down.svg" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="flex items-center w-30 py-3 lg:px-6">
                                <div class="flex w-30 lg:ml-36">
                                    <p class="ml-6 block lg:hidden">{{__('texts.reco_vered')}}</p>
                                    <p class="ml-0 hidden lg:block">{{__('texts.recovered')}}</p>
                                    <div class="flex flex-col lg:ml-2 items-center justify-center">
                                        <a href="{{ route('stats') . "?column=recovered&order=asc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/up.svg" />
                                            </div>
                                        </a>
                                        <a href="{{ route('stats') . "?column=recovered&order=desc&search=".request('search') }}">
                                            <div class="w-4 h-2">
                                                <img src="/assets/down.svg" />
                                            </div>
                                        </a>
                                </div>
                            </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats as $stat)
                        <tr class="flex bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="flex lg:w-20 lg:ml-5 w-10 break-wrods py-3 font-medium text-gray-900 dark:text-white">
                                {{ $stat->country }}
                            </th>
                            <td class="flex items-center py-3 ml-20 lg:ml-[7.8rem] w-20">
                                {{ $stat->cases }} 
                            </td>
                            <td class="flex py-3 items-center w-20 lg:ml-44">
                                {{ $stat->death }}
                            </td>
                            <td class="flex py-3 items-center w-20 lg:ml-[9.5rem]">
                                {{ $stat->recovered }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>
