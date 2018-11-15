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
          <span class="info-box-icon bg-info"><i class="fas fa-camera-retro"></i></span>

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
          <span class="info-box-icon bg-info"><i class="fas fa-video"></i></span>

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
          <span class="info-box-icon bg-info"><i class="fas fa-money-bill-wave"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Баллы</span>
            <span class="info-box-number">{{rand(1, 99999)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-12">
        <div class="card card-widget">
          <div class="card-header">
          <h3 class="card-title">Latest Albums</h3>
          </div>
          <div class="card-body p-0">
            <div class="row ml-0 mr-0 text-center">
              <div class="col-md-3 col-sm-6 col-6  p-2">
                <img src="{{asset('images/person/artyshko.jpg')}}" class="shadow rounded img-fluid pad" alt="">
                <div class="d-block mt-3">
                  <a href="#" class="d-inline btn btn-outline-success col-6">No Name</a>
                  <a href="#" class="d-inline btn btn-outline-danger col-6">Delete</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6  p-2">
                <img src="{{asset('images/person/artyshko.jpg')}}" class="shadow rounded img-fluid pad" alt="">
                <div class="d-block mt-3">
                  <a href="#" class="d-inline btn btn-outline-success col-6">No Name</a>
                  <a href="#" class="d-inline btn btn-outline-danger col-6">Delete</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6  p-2">
                <img src="{{asset('images/person/artyshko.jpg')}}" class="shadow rounded img-fluid pad" alt="">
                <div class="d-block mt-3">
                  <a href="#" class="d-inline btn btn-outline-success col-6">No Name</a>
                  <a href="#" class="d-inline btn btn-outline-danger col-6">Delete</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6  p-2">
                <img src="{{asset('images/person/artyshko.jpg')}}" class="shadow rounded img-fluid pad" alt="">
                <div class="d-block mt-3 mb-2">
                  <a href="#" class="d-inline btn btn-outline-success col-6">No Name</a>
                  <a href="#" class="d-inline btn btn-outline-danger col-6">Delete</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <!-- USERS LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Latest Members</h3>

            <div class="card-tools">
              <span class="badge badge-danger">{{count($users)}} New Members</span>
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
            @foreach($users as $user)
              <li>
                <img src="{{$user->avatar}}" alt="{{$user->name}}"">
                <p class="users-list-name">{{$user->name}}</p>
                <span class="users-list-date">{{$user->created_at->diffForHumans()}}</span>
              </li>
            @endforeach
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
        </div>
        <!--/.card -->
      </div>
    </div>
  </div>
</section>

@stop
