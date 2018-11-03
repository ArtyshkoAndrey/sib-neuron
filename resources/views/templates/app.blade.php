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
   	<title>Siberian neuron - @yield('title')</title>
    <style>
      @yield('style')
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ url('/') }}">Sib Neuron</a>
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
          <li class="nav-item">
            <a class="nav-link" href="#">Вход</a>
          </li>
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
        <div class="col-12 col-md-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-muted">Powered by Fulliton &copy; 2018</small>
        </div>
        <div class="col-md-8">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('teach') }}">Обучение</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Поддержка</a>
            </li>
            
          </ul>
        </div>
      </div>
    </footer>
    <script src="{{asset('js/jquery-slim.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
  </body>
</html>
