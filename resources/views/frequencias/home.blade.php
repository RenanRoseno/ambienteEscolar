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
                <center><h4>LISTAR FREQUÊNCIA</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('frequencias')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
                <a class="btn" href="{{ route('frequencias.cadastrar')}}"><i class="far fa-check-square"></i>&nbsp;Registrar</a>
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
                                    <x-jet-label for="turmas" value="{{ __('Turma') }}" />
                                    <select name="turma" id="turma" class="form-control">
                                        <option>Selecione</option>
                                        @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <x-jet-label for="data" value="{{ __('Data') }}" />
                                    <input type="date" name="data" id='data' class="form-control">
                                </div>

                                <!--div class="col">
                                    <x-jet-label for="mes" value="{{ __('Mês') }}" />
                                    <select name="mes" id="mes" class="form-control">
                                        <option>Selecione</option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div-->
                                <div class="col">
                                    <x-jet-label for="turmas" value="{{ __('Ano') }}" />
                                    <select name="ano" id="ano" class="form-control">
                                        <option>Selecione</option>
                                        <option value="2020">2020</option>

                                    </select>
                                </div>
                            </div>
                            <div id="tabela">
                              <table class="table mt-2">
                                <thead>
                                    <th>#</th>
                                    <th>Matricula</th>
                                    <th>Aluno</th>
                                    <!--th>Data</th-->
                                    <th>Situação</th>
                                    
                                    <!--th>Situação</th-->
                                    <!--th colspan="3"></th-->
                                </thead>
                                <tbody id="tab">
                                </tbody>
                            </table>
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

    $("#ano").change(function(){

        let turma = $("#turma").val();
        let mes = $('#mes').val();
        let data = $('#data').val();
        console.log(data);
        let ano = $('#ano').val();
        if( $("#materia").val() == 'Selecione' || $('#turma').val() == 'Selecione' || $('#periodo').val() == 'Selecione' || $('#prova').val() == 'Selecione'){
            console.log('aq12');
        }else{
            carregaAlunos(turma, ano, data);
            //$('#tabela').reload();
            $('#tabela').show(500);
        }
    });

    function carregaAlunos(turma, ano, data){
        $.ajax({
            url: '/ambienteEscolar/getFrequencias/' + turma + '/' + ano + '/' + data,
            type: 'GET',
            success: function(response){
                console.log(response.alunos[0].nome);
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
        for(let i = 0; i < response.frequencias.length; i++)
        {
            for(let j = 0; j < response.alunos.length; j++){
                if(response.frequencias[i].id_aluno == response.alunos[j].id){

                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td>' + (i+1) + '</td>';
                    cols += '<td>' + response.alunos[j].matricula + '</td>';
                    cols += '<td>' + response.alunos[j].nome + '</td>'
                    //cols += '<td>'+ response.frequencias[i].data+'</td>';

                    
                    let situacao = response.frequencias[i].falta == 0 ? 'Presença' : 'Falta';

                    cols += '<td>'+ situacao +'</td></tr>';

                    newRow.append(cols);

                    $("#tab").append(newRow);       
                }
            }

        }
    }
</script>
</html>

