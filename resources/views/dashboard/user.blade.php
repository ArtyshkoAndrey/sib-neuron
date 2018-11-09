@extends('templates.app')

@section('title', "Пользователь " . Auth::user()->screen_name)

@section('link')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@stop

@section('content')
    
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <div class="nav-link">
              <div class="user-wrapper">
                <img src="{{Auth::user()->avatar}}" class="img-fluid d-inline rounded-circle" alt="">
                <p class="d-inline text-truncate pl-2" style="max-width: 120px">{{ Auth::user()->name }}</p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('user') }}">
              <i class="fas fa-tachometer-alt"></i>
              Глвная панель <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_photos') }}">
              <i class="fas fa-image"></i>
              Фотографии
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <h2>Section title</h2>
    </main>
  </div>
</div>

@stop
