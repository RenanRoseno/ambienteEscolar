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
                <center><h4>LISTAR NOTAS</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('materias')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
            </div>
            <br>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-10">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-1">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form method="POST" style="padding:10px;" action="{{ route('avaliacoes.salvar')}}">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <x-jet-label for="materia" value="{{ __('Materia') }}" />
                                    <select name="materia" id='materia' class="form-control">
                                        <option>Selecione</option>
                                        @foreach($materias as $materia)
                                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                                        @endforeach
                                    </select>
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

                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Periodo') }}" />
                                    <select name="periodo" id="periodo" class="form-control">
                                        <option>Selecione</option>
                                        @foreach($periodos as $periodo)
                                        <option value="{{$periodo->id}}">{{$periodo->bimestre}}° bimestre</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Prova') }}" />
                                    <select name="prova" id="prova" class="form-control">
                                        <option>Selecione</option>
                                        <option value="n1">N1</option>
                                        <option value="n2">N2</option>
                                        <option value="n3">N3</option>
                                        <option value="n4">N4</option>
                                        <option value="n5">N5</option>
                                        <option value="n6">N6</option>
                                        <option value="n7">N7</option>
                                        <option value="n8">N8</option>
                                        <option value="n9">N9</option>
                                        <option value="n10">N10</option>
                                        <option value="recuperacao">Recuperação</option>

                                    </select>
                                </div>
                            </div>
                            <div id="tabela">
                              <table class="table mt-2">
                                <thead>
                                    <th>#</th>
                                    <th>Matricula</th>
                                    <th>Aluno</th>
                                    <th>Nota</th>
                                    <th>Ações</th>
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
        @if(session('success'))
        <script type="text/javascript" defer>sucessos()</script>
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

    $("#prova").change(function(){
        console.log('aq');
        console.log($("#materia").val());
        console.log($('#turma').val());
        console.log($('#periodo').val());
        if( $("#materia").val() == 'Selecione' || $('#turma').val() == 'Selecione' || $('#periodo').val() == 'Selecione' || $('#prova').val() == 'Selecione'){
            console.log('aq12');
        }else{
            carregaAlunos($('#turma').val(), $('#periodo').val() , $('#materia').val(), $('#prova').val());
            //$('#tabela').reload();
            $('#tabela').show(500);
        }
    });

    function carregaAlunos(turma, periodo, materia, nota){
        $.ajax({
            url: '/ambienteEscolar/getAvaliacoes/' + turma +'/'+ periodo+'/'+ materia + '/' + nota,
            type: 'GET',
            success: function(response){
                console.log(response);
                insereValores(response, nota);
            },
            error:function(response){
                console.log(0);
                console.log(response);
            }
        })

    }

    function insereValores(response,nota){
        $('#tab').empty();
        for(let i = 0; i < response.avaliacoes.length; i++)
        {   
            var aluno = "";
            var cols = "";
            var aux = "";
            var newRow = $("<tr>");
            cols += '<td>' + (i+1) + '</td>';

            for(let j = 0; j < response.alunos.length; j++){
                if(response.avaliacoes[i].id_aluno == response.alunos[j].id){
                    cols += '<td>' + response.alunos[i].matricula+ '</td>';
                    cols += '<td>' + response.alunos[i].nome + '</td>';
                    aux += '<td>' +'<a href="/ambienteEscolar/avaliacoes/boletim/' + response.alunos[i].id +'"> <i class="fa fa-file"></i>' + '</a></td></tr>';
                }
            }


            cols += '<td>' + response.avaliacoes[i].nota + '</td>';
            cols += aux;


            newRow.append(cols);

            $("#tab").append(newRow);

        }
    }
</script>
</html>

