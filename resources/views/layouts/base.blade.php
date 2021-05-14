<html>
    <head>
        <!-- <input type ="image" src="/images/Nanterre_logo.png" class="center-block" width="200" action="base.blade.php"> -->
        <a href="{{ url('/') }}">
          <input type ="image" src="/images/Nanterre_logo.png" class="center-block" width="150">
        </a>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <ul class="nav justify-content-center">
              <li class="nav-item">
                  <a class="nav-link active" href="{{ url('/addEtudiant') }}">Ajouter un étudiant</a>
              </li>
              <li class="nav-item">
                  <a  class="nav-link active" href="{{ url('/import') }}">Importer des étudiants</a>
              </li>
              <li class="nav-item">
                  <a  class="nav-link active" href="{{ url('/listeEtudiants') }}">Liste des étudiants</a>
              </li>
              <li class="nav-item">
                  <a  class="nav-link active" href="{{ url('/informationStage') }}">Saisir informations sur le stage</a>
              </li>
              <li class="nav-item">
                  <a  class="nav-link active" href="{{ url('/informationCarriereProfessionnelle') }}">Saisir informations sur la carrière professionelle</a>
              </li>
            <li class="nav-item">
                <a  class="nav-link active" href="{{ url('/exportData') }}">Export des étudiants</a>
            </li>
          </ul>

            @yield('content')
        </div>

        <script src="{{ url('/js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
