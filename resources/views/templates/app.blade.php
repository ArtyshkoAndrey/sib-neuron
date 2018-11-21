<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  	<link rel="stylesheet" href="{{asset('css/product.css')}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="{{asset("js/parallax.js")}}"></script>
    @yield('link')
   	<title>Siberian neuron - @yield('title')</title>
    <style>
      @yield('style')
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('images/logo.png')}}" alt="Logo sib_neurblackblackon" class="brand-image"
             style="opacity: .8; height: 30px" >
        <span class="brand-text font-weight-light">Siberian Neuron</span>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link {{active('index')}}" href="{{ route('index') }}">Главная <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link {{active('teach')}}" href="{{ route('teach') }}">Обучение</a>
          </li> -->
          @guest
            <li class="nav-item">
              <a class="nav-link {{active('login')}}" href="{{ route('login') }}">Вход</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link {{active('user')}}" href="{{ route('user') }}">Профиль</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{active('logout')}}" href="{{ route('logout') }}">Выход</a>
            </li>
          @endguest
        </ul>
      </div>
    </nav>

    <div id="app">
			@yield('content')
		</div>

    <footer class="container-fluid mt-5 py-5 bg-secondary text-white">
      <div class="row">
        <div class="offset-1 col-10 col-md">
          <small class="d-block mb-3">Powered by Fulliton &copy; 2018 Все права защищены</small>
          <p>Контакты технической поддержки: <a href="mailto:artyshko.andrey@gmail.com?subject=Проблемы&cc=artyshko.andrey@gmail.com">artyshko.andrey@gmail.com</a></p>
          <p>Эл. адрес для общих запросов: <a href="mailto:admin@artyshko.ru?subject=Проблемы&cc=admin@artyshko.ru">admin@artyshko.ru</a></p>
        </div>
        <div class="col-12 col-md-2">
          {{--<h5>Основные</h5>--}}
          <ul class="list-unstyled text-small">
            <li><a href="{{ url('/') }}">Главная</a></li>
            <!-- <li><a href="{{ route('teach') }}">Обучение</a></li> -->
            @guest
              <li><a href="{{ route('login') }}">Вход</a></li>
            @else
              <li><a href="{{ route('user') }}">Профиль</a></li>
              <li><a href="{{ route('logout') }}">Выход</a></li>
            @endguest
          </ul>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="{{asset('js/jquery-slim.min.js')}}"></script> -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('js/popper.min.js')}}"></script> -->
    <!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js"></script> -->
    <!-- <script>
      var elem = document.querySelector('.m-p-g');

      document.addEventListener('DOMContentLoaded', function() {
        var gallery = new MaterialPhotoGallery(elem);
      });
    </script> -->
    @yield('footer')
  </body>
</html>
