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
                <center><h4>REGISTRAR FREQUÊNCIA</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('frequencias')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
            </div>
            <br>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-10">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-1">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form method="POST" style="padding:10px;" action="{{ route('frequencias.salvar')}}">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <x-jet-label for="data" value="{{ __('Data') }}" />
                                    <input type="date" name="data" id="data" class="form-control">
                                </div>

                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Turma') }}" />
                                    <select name="turma" id="turma" class="form-control">
                                        <option>Selecione</option>
                                        @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                
                            </div>
                            <div id="tabela">
                              <table class="table mt-2">
                                <thead>
                                    <th>#</th>
                                    <th>Matricula</th>
                                    <th>Aluno</th>
                                    <th>Presença</th>
                                    <!--th>Situação</th-->
                                    <!--th colspan="3"></th-->
                                </thead>
                                <tbody id="tab">
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

    $(document).ready(function(){
      $('#tabela').hide();  
  })

    $("#turma").change(function(){
        
        if($('#turma').val() == 'Selecione'|| $('#data').val() == ''){
            
        }else{
            carregaAlunos($('#turma').val());
            //$('#tabela').reload();
            $('#tabela').show(500);
        }
    });

    function carregaAlunos(turma){
        $.ajax({
            url: '/ambienteEscolar/getAlunos/' + turma,
            type: 'GET',
            success: function(response){
                console.log(response.length);
                insereValores(response);
            },
            error:function(response){
                console.log(0);
                console.log(response);
            }
        })

    }

    function insereValores(response){
        $('#tab').empty();
        for(let i = 0; i < response.length; i++)
        {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td>' + (i+1) + '</td>';
            cols += '<td>' + response[i].matricula + '</td>';
            cols += '<td>' + response[i].nome + '</td>';
            cols += '<td>' +"<input type='checkbox' class='form-control' style='border:1px solid gray; width:70px;' name='"+response[i].matricula+"' id='"+response[i].matricula+"'" +'</td></tr>';

            newRow.append(cols);

            $("#tab").append(newRow);

        }
    }
</script>
</html>

