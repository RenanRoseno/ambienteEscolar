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
                <center><h4>REGISTRAR NOTAS</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('materias')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
            </div>
            <br>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-10">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-1">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form method="POST" style="padding:10px;" action="{{ route('materias.inserir')}}">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Materia') }}" />
                                    <select name="professor_id" id="professor" class="form-control">
                                        <option>Selecione</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Turma') }}" />
                                    <select name="professor_id" id="professor" class="form-control">
                                        <option>Selecione</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Periodo') }}" />
                                    <select name="professor_id" id="professor" class="form-control">
                                        <option>Selecione</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Prova') }}" />
                                    <select name="professor_id" id="professor" class="form-control">
                                        <option>Selecione</option>

                                    </select>
                                </div>
                            </div>
                            <div id="tabela">
                              <table class="table" id="tab" >
                                <thead>
                                    <th>#</th>
                                    <th>Matricula</th>
                                    <th>Aluno</th>
                                    <th>Nota</th>
                                    <th>Situação</th>
                                    <th colspan="3"></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <button><i class="fa fa-check"></i></button>
                                        </td>
                                        <td>
                                            <button><i class="fa fa-edit"></i></button>
                                        </td>
                                        <td>
                                            <button><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr> 

                                    <!--tr>
                                        <td colspan="5"> Não há registros</td>
                                    </tr-->

                                </tr>
                            </tbody>
                        </table>
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
    $('#materia').on('keyup', (ev) => {
        $('#materia').val($('#materia').val().toUpperCase());
    });
</script>
</html>

