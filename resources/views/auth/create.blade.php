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
                        <h2 class="font-black text-xl lg:text-2xl">{{__('user.welcome_back')}}</h2>
                    </div>
                    <div>
                        <p class="mt-2 lg:mt-2 text-gray-400 text-base lgtext-xl">{{__('user.please_enter_your_details')}}</p>
                    </div>
                    
                    <form method="POST" action="/login" class="mt-6">
                        @csrf
                        <div class="flex flex-col w-full text-sm lg:text-base"> 
                            <label for="username" class="font-bold">{{__('user.username')}}</label>
                            <input name="username" type="username" value="{{ old('username') ?: old('email') }}" required autofocus placeholder="{{__('user.enter_unique_username_or_email')}}" 
                            class="
                            outline-0 rounded-lg border-2 mt-2 pl-6 h-14 focus:border-[#2029f3]
                            {{$errors->has('username') ? 'border-red-500 ' : ''}}
                            {{!$errors->has('username') ?' active:border-green-500 ': ''}}">
                        </div>
                        @error('username')
                        <span class="flex text-red-600 ml-1 mt-1">
                            <img src="/assets/error.svg" />
                            <p class="ml-1">{{ $message }}</p>
                        </span>
                        @enderror

                        <div class="flex flex-col w-full text-sm lg:text-base"> 
                            <label for="password" class="mt-4 font-bold">{{__('user.password')}}</label>
                            <input name="password" type="password" value="{{ old('username') ?: old('email') }}" required autofocus placeholder="{{__('user.fill_in_password')}}" 
                            class="focus:border-[#2029f3] outline-0 rounded-lg border-2 mt-2 pl-6 h-14" >
                        </div>
                        @error('password')
                        <span class="flex text-red-600 ml-1 mt-1">
                            <img src="/assets/error.svg" />
                            <p class="ml-1">{{ $message }}</p>
                        </span>   
                        @enderror

                        <div class="flex mt-6">
                            <label for="remember"></label>
                            <input type="checkbox" name="remember">

                            <p class="ml-2 text-sm font-semibold">{{__('user.remember_this_device')}}</p>

                            <p class="ml-11 text-blue-600 font-semibold text-sm"><a href="{{ route('password.request') }}">{{__('user.forgot_password')}}</a></p>
                        </div>

                        <div class="h-14 mt-7 flex justify-center items-center font-black text-white text-base bg-green-500 rounded">
                            <button type="submit">{{__('user.log_in')}}</button>
                        </div>
                    </form>
                    
                        <div class="flex justify-center mt-6">
                            <p class="text-gray-400 text-sm lg:text-base">{{__('user.dont_have_an_account')}}</p>
                            <p class="font-bold ml-2 text-sm lg:text-base"><a href="{{ route('register.create') }}">{{__('user.register_for_free')}}</a></p>
                        </div>

                </div>
            </div>
            <div class="hidden lg:flex lg:w-[604px] min-h-screen">
                <img class="h-full" src="/assets/vax.png" />
            </div>
        </div>
    </body>
</html>
