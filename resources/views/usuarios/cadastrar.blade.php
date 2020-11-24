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
        <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script--->
        <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

        <script type="text/javascript" src="/js/mensagem.js"></script>
        <script type="text/javascript" src="/js/jquery.maskedinput-1.3.min.js"></script>
        <script>
            jQuery(function($){
               $("#cpf").mask("999.999.999-99");
               $("#telefone").mask("(99) 99999-9999");

           });
       </script>



   </head>
   <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-2" >
                <center><h4>CADASTRO DE USUÁRIOS</h4></center>
            </div>

            <div style="margin-left: 82%; margin-top: -60px;">
                <a class="btn" href="{{ route('turmas')}}"><i class="fa fa-list"></i>&nbsp;Listar</a>
                <a class="btn" href="{{ route('turmas.cadastrar')}}"><i class="fa fa-plus"></i>&nbsp;Nova</a>
            </div>
            <br>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-3" id="con">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form method="POST" style="padding:10px;" action="{{route('usuarios.inserir')}}" id="form1">
                            @csrf

                            <div class="mt-2 row">
                                <div class="col">
                                    <x-jet-label for="tipo" value="{{ __('Tipo do usuário') }}" />
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option>Selecione</option>
                                        <option value="1">Aluno</option>
                                        <option value="2">Professor</option>
                                        <option value="3">Administrador</option>
                                    </select>
                                </div>
                                <div id="matricula" class="col">
                                    <x-jet-label for="matricula" value="{{ __('Matricula') }}" />
                                    <x-jet-input id="matricula" class="mt-1 w-full" type="text" name="matricula"/>
                                </div>
                            </div>
                            <div id="cadastro">
                                <div class="mt-2">
                                    <x-jet-label for="nome" value="{{ __('Nome') }}" />
                                    <x-jet-input id="nome" class="mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
                                </div>

                                <div class="row">

                                    <div class="mt-2" id="emailF">
                                        <div class="col">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="mt-1 w-full" type="email" name="email" autocomplete="email" />
                                        </div>
                                    </div>

                                    <div class="col mt-2">
                                      <x-jet-label for="telefone" value="{{ __('Telefone') }}" />
                                      <x-jet-input id="telefone" class="mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required autofocus autocomplete="telefone" />
                                  </div>


                                    <div class="col mt-2" id="turmaF">
                                      <x-jet-label for="turma" value="{{ __('Turma') }}" />
                                      <select name="id_turma" class="form-control">
                                          <option value="">Selecione</option>
                                          @foreach($turmas as $turma)
                                          <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                              </div>

                              <div class="mt-4 row">
                                <div class="col">
                                    <x-jet-label for="data_nasc" value="{{ __('Data de Nascimento') }}" />
                                    <x-jet-input id="data_nasc" class="mt-1 w-full" type="date" name="data_nasc" required autofocus autocomplete="data_nasc" />
                                </div>
                                <div class="col">
                                    <x-jet-label for="cpf" value="{{ __('CPF') }}" />
                                    <x-jet-input id="cpf" class="mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
                                </div>

                                <div class="col">
                                 <x-jet-label for="rg" value="{{ __('RG') }}" />
                                 <x-jet-input id="rg" class="mt-1 w-full" type="text" name="rg" :value="old('rg')" required autofocus autocomplete="rg" />
                             </div>
                         </div>
                         <div class="mt-2 row">
                             <div class="col">
                                 <x-jet-label for="usuario" value="{{ __('Usuário') }}" />
                                 <x-jet-input id="usuario" class="mt-1 w-full" type="text" name="usuario" :value="old('usuario')" required autofocus autocomplete="usuario" />
                             </div>
                             <div class="col">
                                 <x-jet-label for="senha" value="{{ __('Senha') }}" />
                                 <x-jet-input id="senha" class="mt-1 w-full" type="password" name="senha" :value="old('senha')" autocomplete="senha" />
                             </div>
                         </div>
                     </div>
                     <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Cadastrar') }}
                        </x-jet-button>
                    </div>
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

 $(document).ready(function(){
    console.log('OK');
    $('#cadastro').hide();
    $('#matricula').hide();
    $('#turmaF').hide();
    $('#tipo').change(function(){

        let delay = 500;
        let tipo = $('#tipo').val();

        switch(tipo){
            case '1':

            $('#cadastro').show(delay);
            $('#matricula').show(delay);
            $('#turmaF').show();
            $('#emailF').hide(delay);
            break;

            case '2': 
            $('#matricula').hide(delay);
            $('#turmaF').hide();
            $('#cadastro').show(delay);
            $('#emailF').show(delay);
            break;

            case '3':
            $('#matricula').hide(delay);
            $('#cadastro').show(delay);
            $('#turmaF').hide();
            $('#emailF').show(delay);
            break;

            default:
            break;
        }

    })
})

 $('#turma').on('keyup', (ev) => {
    $('#turma').val($('#turma').val().toUpperCase());
});



    /*
    */
</script>
</html>

