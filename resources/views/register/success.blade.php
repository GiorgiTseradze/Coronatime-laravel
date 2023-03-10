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
                <div class="w-[21.4rem] lg:w-[23.4rem]">
                    <div class="flex lg:justify-center ml-4 lg:ml-0 mt-6 lg:mt-8 w-full">
                        <img src="/assets/corona.png"/>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center h-96 lg:h-[37.5rem] w-full">
                    <img src="/assets/checked.png"/>
                    <p class="text-base lg:text-lg mt-4">{{__('user.your_account_is_confirmed_you_can_sign_in')}}</p>
                    <button class="px-32 lg:px-40 py-4 h-14 mt-7 lg:h-14 lg:w-96 lg:mt-24 flex justify-center items-center font-black text-white text-base bg-green-500 rounded"
                    type="submit"><a href="{{ route('auth.create') }}">{{__('user.log_in')}}</a></button>
                </div>

            </div>
    </body>
</html>

