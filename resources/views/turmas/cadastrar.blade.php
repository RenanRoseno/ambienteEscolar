<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        a, a:hover{
            text-decoration: none;
            color:black;

        }
    </style>

    <link href="/frameworks/fa/css/all.css" rel="stylesheet">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-2" style="margin-left: 82%">
                
                <button type="button" class="btn btn-success"><i class="fa fa-list"></i>&nbsp;Listar</button>

                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Nova</button>
                

            </div>
            
        </header>

        <!-- Page Content -->
        <main>
         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-jet-button class="ml-4">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>

