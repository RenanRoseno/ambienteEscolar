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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/mensagem.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-2" >
                <center><h4>CADASTRO DE TURMAS</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('turmas')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
                <a class="btn" href="{{ route('turmas.cadastrar')}}"><i class="fa fa-plus"></i>&nbsp;Nova</a>
            </div>
            <br>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-10">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form method="POST" style="padding:10px;" action="{{ route('turmas.inserir')}}">
                            @csrf

                            <div>
                                <x-jet-label for="turma" value="{{ __('Turma') }}" />
                                <x-jet-input id="turma" class="mt-1 w-full" type="text" name="turma" :value="old('turma')" required autofocus autocomplete="turma" />
                            </div>

                            <div class="mt-4 row">
                                <div class="col">
                                    <x-jet-label for="email" value="{{ __('Turno') }}" />
                                    <select class="form-control" name="turno" required>
                                        <option selected disabled>Selecione</option>
                                        <option value="M">Manhã</option>
                                        <option value="T">Tarde</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <x-jet-label for="email" value="{{ __('Série') }}" />
                                    <select name="serie" class="form-control" required>
                                     <option disabled selected>Selecione</option>
                                     <option value="1°">1°</option>
                                     <option value="2°">2°</option>
                                     <option value="3°">3°</option>
                                     <option value="4°">4°</option>
                                     <option value="5°">5°</option>
                                     <option value="6°">6°</option>
                                     <option value="7°">7°</option>
                                     <option value="8°">8°</option>
                                     <option value="9°">9°</option>
                                 </select>
                             </div>

                             <div class="col">
                                <x-jet-label for="qtd_max" value="{{ __('Quantidade máxima') }}" />
                                <x-jet-input id="qtd_max" class="mt-1" type="number " name="qtd_max" :value="old('qtd_max')" required />
                            </div>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Cadastrar') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @if(session('error'))
        <script type="text/javascript" defer>erro()</script>
        @endif
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
<script type="text/javascript">
    $('#turma').on('keyup', (ev) => {
        $('#turma').val($('#turma').val().toUpperCase());
    });
</script>
</html>

