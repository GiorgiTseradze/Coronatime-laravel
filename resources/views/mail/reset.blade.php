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
    <body stlye="font-family:'inter'; width:full; height:full; ">
        <div style="width: 100%; height: 100%;">
            
            <div style="margin: auto; width:343px;">
                <img src="{{ $message->embed(public_path() . '/assets/mail.png')}}" style="width:343px; height:241px; margin-top: 16px;"/>  
            </div>
             
            <div style="margin: auto; width: 343px; margin-top: 40px;">
                <div>
                    <h1 style="margin: auto;  width: 55%; font-size: 24px; font-weight: bold;">{{__('user.reset_password')}}</h1>
                </div>
                <div>
                    <p style="margin: auto; width: 77%; font-size: 16px; margin-top: 8px;">{{__('user.click_this_button_to_verify_your_email')}}</p>
                </div>
            </div>
            <div style="margin: auto; width:343px; height:70px;">
                <div style="background-color: #22c55e; height: 56px; margin-top: 24px; width:343px; font-size:16px; border-radius: 25px;">
                        <a href="{{ $url }}" style="display: block; margin: auto; width: 41%; padding-top: 4%; text-decoration: none; font-family:'inter'; color:white; font-weight:bold;" >{{__('user.recover_password')}}</a>
                </div>
            </div>
        </div>
    </body>
</html>


