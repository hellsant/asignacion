<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignacion de Tribunales</title>
    <link rel="icon" href="{{ asset ('img/fav-icon.png')}}" type="image/x-icon" />
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('web-fonts-with-css/css/fontawesome-all.min.css')!!}
    {!!Html::style('web-fonts-with-css/css/fa-solid.min.css')!!}
    {!!Html::style('web-fonts-with-css/css/fa-brands.min.css')!!}
    {!!Html::style('web-fonts-with-css/css/fa-regular.min.css')!!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic')!!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800')!!}
    {!!Html::style('css/clean-blog.min.css')!!}
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/">Globodyne</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registrar
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profesional.create') }} ">Registrar Profesional</a>
                <a class="dropdown-item" href="{{ route('proyecto.create') }}">Registrar Perfil</a>
                <a class="dropdown-item" href="{{ route('estudiante.create') }} ">Registrar Estudiantes</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Listas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profesional.index') }} ">Lista de profesionales</a>
                <a class="dropdown-item" href="{{ route('profesional.index') }} ">Registrar Estudiantes</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Sugerir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>@yield('titulo1')</h1>
              <span class="subheading">

                @yield('titulo2')

              </span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      
      @yield('content')
    
    </div>
    <hr>
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p class="copyright text-muted">Copyright &copy; Globodyne 2018</p>
          </div>
        </div>
      </div>
    </footer>
  </body>
  
  {!! Html::script('jquery/jquery.min.js') !!}
  {!! Html::script('js/bootstrap.min.js') !!}
  {!! Html::script('js/bootstrap.bundle.min.js') !!}
  {!! Html::script('js/jqBootstrapValidation.min.js') !!}
  {!! Html::script('js/clean-blog.min.js') !!}
</html>
