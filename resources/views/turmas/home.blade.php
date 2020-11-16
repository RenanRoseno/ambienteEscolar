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
                        sdjdsfhhg   
                    </div>
                </div>
            </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

