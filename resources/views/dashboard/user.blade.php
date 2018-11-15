@extends('dashboard.templates.app')

@section('title', "Пользователь " . Auth::user()->screen_name)

@section('content')

<section class="content">
  <div class="container-fluid">
    <h5 class="mb-2">Персональная информация</h5>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-images"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Фотографий в ВК</span>
            <span class="info-box-number">{{count(Auth::user()->photos)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-images"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Обр. фотографий</span>
            <span class="info-box-number">{{rand(1, 100)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-images"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Видеозаписи</span>
            <span class="info-box-number">{{rand(1, 10)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-images"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Баллы</span>
            <span class="info-box-number">{{rand(1, 99999)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
  </div>
</section>

@stop
