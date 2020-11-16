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
    <link rel="stylesheet" href="/frameworks/iziToast/dist/css/iziToast.min.css">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    <script type="text/javascript" src="/frameworks/iziToast/dist/js/iziToast.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/mensagem.js"></script>
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-2"> 
               <center><h4>LISTAGEM DE TURMAS</h4></center>           
           </div>

           <div style="margin-left: 82%; margin-top: -60px;">
            <a class="btn" href="{{ route('turmas')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
            <a class="btn" href="{{ route('turmas.cadastrar')}}"><i class="fa fa-plus"></i>&nbsp;Nova</a>
        </div>
    </header>

    <!-- Page Content -->
    <main>

       <div class="py-12" id='content'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th>Quantidade máx</th>
                        <th>Quantidade disponível</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>


                        @forelse($turmas as $key=>$turma)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $turma->turma }}</td>
                            <td>{{ $turma->turno }}</td>
                            <td>{{ $turma->qtd_max}}</td>
                            <td>{{ $turma->qtd_disponivel}}</td>
                            <td>
                                <a href="{{ route('turmas.editar', [$turma->id])}}"class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('turmas.excluir', [$turma->id])}}"class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash lg"></i></a>
                            </td> 
                        </tr> 
                        @empty
                        <tr>
                            <td colspan="5"> Não há registros</td>
                        </tr>
                        @endforelse
                    </tr>

                </tbody>
            </table>
           @if(session('success'))
                <script type="text/javascript" defer> sucesso()</script>
           @endif

           @if(session('error'))
                <script type="text/javascript" defer>erro()</script>
           @endif
        </div>
    </div>
</div>

</main>
</div>

@stack('modals')

@livewireScripts

</body>
</html>

