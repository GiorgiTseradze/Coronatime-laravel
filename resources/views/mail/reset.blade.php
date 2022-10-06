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
    <body stlye="display:flex; flex-direction:column; font-family:'inter'; width:full; height:full; ">
        <div style="width: 100%; height: 100%;">
            
            <div style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:100%;">
                <img src="{{ $message->embed(public_path() . '/assets/mail.png')}}" style="width:343px; height:241px; margin-top: 16px;"/>  
            </div>
             
            <div style="display:flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; margin-top: 40px;">
                <h1 style="font-size: 24px; font-weight: bold;">{{__('user.reset_password')}}</h1>
                <p style="font-size: 16px; margin-top: 8px;">{{__('user.click_this_button_to_verify_your_email')}}</p>
            </div>
            <div style="display:flex; justify-content:center; width:100%;">
                <div style="background-color: rgb(34 197 94); height: 56px; margin-top: 24px; display:flex; flex-direction:column; width:343px; justify-content:center; align-items:center; font-size:16px; border-radius: 25px;">
                    <a style="text-decoration: none; font-family:'inter'; color:white; font-weight:bold;" href="{{ $url }}">{{__('user.recover_password')}}</a>
                </div>
            </div>
        </div>
    </body>
</html>