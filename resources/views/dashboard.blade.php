<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style type="text/css">
    a, a:hover{
      text-decoration: none;
      color:black;

    }
  </style>
</head>

<x-app-layout>
  <x-slot name="header">
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <main>
          <div class="container" style="padding: 30px;">
            <div class="row">
              <div class="col col-md-7 text-justify">
                <h1 style="font-size: 30px;font-family: 'Poppins', sans-serif;">AMBIENTE ESCOLAR</h1><br>
                <p>A plataforma pedagógica escolar tem o objetivo de orientar e servir como apoio pedagógico diário a pais, alunos e professores.</p><br>
                Equipe:
                <ul type="circle">
                  <li>Lidiane Ferreira dos Santos</li>
                  <li>Renata Claziela Monteiro</li>
                  <li>Silvia Helena Pimenta Medonça</li>
                </ul>
              </div>
              <div class="col col-md-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images/escola.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <!--img  height="450" width="450"-->
                      <img class="d-block w-100" src="/images/ideia.jpg"  alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/professores.jpeg" alt="First slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</x-app-layout>
