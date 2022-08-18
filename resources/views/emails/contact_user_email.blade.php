<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="py-12">
            <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <h1>{{ $contactUser['contactForm']['name'] }}</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if($contactUser['name']) Name: {{ $contactUser['name'] }} <br /> @endif
                        @if($contactUser['email']) Email: {{ $contactUser['email'] }} <br /> @endif
                        @if($contactUser['phone']) Phone: {{ $contactUser['phone'] }} <br /> @endif
                        @if($contactUser['gender']) Gender: {{ $contactUser['gender'] }} <br /> @endif
                        @if($contactUser['date_of_birth']) DOB: {{ $contactUser['date_of_birth'] }} <br />@endif
                        @if($contactUser['description']) Description: {{ $contactUser['description'] }} <br /> @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
