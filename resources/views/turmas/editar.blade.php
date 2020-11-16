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
                                <x-jet-input id="turma" value="{{$turma->turma}}" class="mt-1 w-full" type="text" name="turma" required autofocus autocomplete="turma" />
                                </div>

                                <div class="mt-4 row">
                                    <div class="col">
                                        <x-jet-label for="email" value="{{ __('Turno') }}" />
                                        <select class="form-control" name="turno" required>
                                            <option selected disabled>Selecione</option>
                                            @if($turma->turno == 'M')
                                            <option value="M" selected>Manhã</option>
                                            @else
                                            <option value="M">Manhã</option>
                                            @endif
                                            @if($turma->turno == 'T')
                                            <option value="T" selected>Tarde</option>
                                            @else
                                            <option value="T">Tarde</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col">
                                        <x-jet-label for="email" value="{{ __('Série') }}" />
                                        <select name="serie" class="form-control" required>
                                         <option disabled selected>Selecione</option>
                                         @for($i = 1; $i<10; $i++)

                                         @if($i == substr($turma->serie, 0, 1))
                                         <option value="{{$i}}°" selected>{{$i}}°</option>
                                         @else
                                         <option value="{{$i}}°">{{$i}}°</option>
                                         @endif
                                         @endfor
                                     </select>
                                 </div>

                                 <div class="col">
                                    <x-jet-label for="qtd_max" value="{{ __('Quantidade máxima') }}" />
                                    <x-jet-input id="qtd_max" class="mt-1" type="number " name="qtd_max" value="{{$turma->qtd_max}}" required />
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

