<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  	<link rel="stylesheet" href="{{asset('css/style.css')}}" />
  	<link rel="stylesheet" href="{{asset('css/product.css')}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    @yield('link')
   	<title>Siberian neuron - @yield('title')</title>
    <style>
      @yield('style')
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ url('/') }}">
        <i class="fas fa-images"></i>
        Siberian Neuron
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('teach') }}">Обучение</a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Вход</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user') }}">Профиль</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Выход</a>
            </li>
          @endguest
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Найти" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
      </div>
    </nav>

    <div id="app">
			@yield('content')
		</div>

    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <small class="d-block mb-3 text-muted">Powered by Fulliton &copy; 2018</small>
        </div>
        <div class="col-6 col-md-2">
          <h5>Основные</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="{{ url('/') }}">Главная</a></li>
            <li><a class="text-muted" href="{{ route('teach') }}">Обучение</a></li>
            <li><a class="text-muted" href="{{ route('login') }}">Вход</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{asset('js/jquery-slim.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js"></script>
    <script>
      var elem = document.querySelector('.m-p-g');

      document.addEventListener('DOMContentLoaded', function() {
        var gallery = new MaterialPhotoGallery(elem);
      });
    </script>
  </body>
</html>
