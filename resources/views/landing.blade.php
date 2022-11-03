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
    <body class="flex flex-col lg:items-center justify-center items-center font-['inter'] w-full h-full">

        <div class="flex flex-col lg:items-center w-[343px] lg:w-[1440px] lg:h-[1112px]">
            <div class="flex flex-wrap items-center lg:justify-center mt-6 w-full">
                <div class="">
                    <a href="/"><img src="/assets/corona.png"/></a>
                </div>

                <div class="flex items-center w-max lg:ml-[769px]">
                    <div class="flex justify-center items-center">
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
                                class="flex items-center gap-2 lg:ml-0 bg-white px-5 py-2.5 rounded"
                            >   
                                <p>{{__('texts.english')}}</p>

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
                    <div>
                        <img class="lg:hidden"src="/assets/menu.svg" />
                    </div>
                    @auth
                    <div class="hidden lg:block lg:ml-12">
                        <p class="font-black">{{ auth()->user()->username }}</p>
                    </div>
                   
                    <div class="hidden lg:block lg:ml-6">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit">{{__('user.log_out')}}</button>
                        </form>
                    </div>
                    @endauth
                </div>
                
                <div class="flex font-black text-xl mt-12 lg:w-[1224px] ">
                    <h1 class="lg:justify-start flex justify-center">{{__('texts.worldwide_statistics')}}</h1>
                </div>

                <div class="lg:justify-start flex justify-center mt-6 lg:w-[1224px] border-b-2">
                        <div class="border-b-4 border-black">
                            <h2 class="mb-2 font-black"><a href="/">{{__('texts.worldwide')}}</a></h2>
                        </div>
                        <div>
                            <h2 class="mb-2 ml-6"><a href="/stats">{{__('texts.by_country')}}</a></h2>
                        </div>
                </div>

                <div class="lg:ml-26 mt-10 w-[343px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-purple-100">
                    <div class="flex flex-col items-center mt-6 lg:mt-10">
                        <img src="/assets/purple.svg" />
                        <p class="mt-4 font-medium text-base">{{__('texts.new_cases')}}</p>
                        <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->cases }}</p>
                    </div>
                </div>

                <div class=" grid grid-cols-2">
                    <div class="mt-4 lg:ml-2 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-green-100">
                        <div class="flex flex-col items-center mt-12">
                            <img src="/assets/green.svg" />
                            <p class="mt-4 font-medium text-base">{{__('texts.recovered')}}</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->recovered }}</p>
                        </div>
                    </div>
                    <div class="ml-2 mt-4 lg:mt-10 w-[164px] h-[193px] lg:w-[392px] lg:h-[255px] rounded-2xl bg-yellow-100">
                        <div class="flex flex-col items-center mt-12">
                            <img src="/assets/yellow.svg" />
                            <p class="mt-4 font-medium text-base">{{__('texts.deaths')}}</p>
                            <p class="mt-4 text-blue-700 font-black text-2xl">{{ $stats[0]->death }}</p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>
