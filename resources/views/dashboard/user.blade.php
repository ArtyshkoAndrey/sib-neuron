@extends('dashboard.templates.app')

@section('title', "Пользователь " . Auth::user()->screen_name)

@section('style')
  Стили CSS

.thumbs {
  width: 100%;
  margin: 10px;
  opacity: 0;
  overflow: hidden;
  position: relative;
  border-radius: 3px;
  cursor: pointer;
  -webkit-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.thumbs:before {
  content: '';
  background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  width: calc(100% - 1rem);
  height: calc(100% - 1rem);
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  margin: .5rem;
  border-radius: .25rem;
}
.thumbs img {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}
.thumbs .caption {
  width: 100%;
  padding: 20px;
  color: #fff;
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 3;
  text-align: center;
}
.thumbs .caption span, .thumbs .caption a {
  display: block;
  opacity: 0;
  position: relative;
  top: 10px;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
.thumbs .caption .title {
  line-height: 1;
  font-weight: normal;
  font-size: 18px;
}
.thumbs .caption .info {
  line-height: 1.2;
  margin-top: 5px;
  font-size: 12px;
}
.thumbs:focus:before,
.thumbs:focus span, .thumbs:hover:before, .thumbs:hover span, .thumbs:hover a, .thumbs:focus a {
  opacity: 1;
}
.thumbs:focus:before, .thumbs:hover:before {
  top: 0;
}
.thumbs:focus span, .thumbs:hover span, .thumbs:hover a, .thumbs:focus a {
  top: 0;
}
.thumbs:focus a, .thumbs:hover a {
  -webkit-transition-delay: 0.3s;
          transition-delay: 0.3s;
}
.thumbs:focus .title, .thumbs:hover .title {
  -webkit-transition-delay: 0.15s;
          transition-delay: 0.15s;
}
.thumbs:focus .info, .thumbs:hover .info {
  -webkit-transition-delay: 0.25s;
          transition-delay: 0.25s;
}

.card-body img {
    object-fit: cover; width: 256px; height: 256px;
  }
@stop


@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible absolute">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fa fa-check"></i> Удачно!</h5>
   {{ session('status') }}
</div>
@endif

<section class="content">
  <div class="container-fluid">
    <h5 class="mb-2">Персональная информация</h5>
    <div class="row">
      <div class="col-md-4 col-12">
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
      <div class="col-md-4 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-camera-retro"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Обр. фотографий</span>
            <span class="info-box-number">{{$countProcessedPhotos}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-video"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Видеозаписи</span>
            <span class="info-box-number">{{rand(1, 10)}}</span> <!-- Изменить -->
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="card card-widget">
          <div class="card-header">
            <h3 class="card-title">Последние альбомы</h3>
          </div>
          <div class="card-body p-0">
            <div class="row mx-0 text-center">
            @forelse($albums as $album)
              <div class="col-6 p-2 thumbs">
                <img src="{{$album['album_first_photo']->url}}" class="shadow rounded img-fluid pad" alt="">
                <div class="caption">
                  <span class="title">{{$album['category_name']}}</span>
                  <div class="mt-2 row">
                    <div class="col-6">
                      <a href="{{ route('albums.show', $album['category_id']) }}" class="btn btn-outline-success col-12"><i class="fas fa-eye"></i></a>
                    </div>
                    <div class="col-6">
                      <!-- <a href="{{ route('albums.destroy', $album['category_id']) }}" class="btn btn-outline-danger col-12"><i class="fas fa-trash-alt"></i></a> -->
                      <form id="delete-form-{{$album['category_id']}}" method="post" action="{{ route('albums.destroy', $album['category_id']) }}" style="display: none">
                        @csrf
                        {{ method_field('DELETE') }}
                      </form>
                      <a href="" onclick="
                      if(confirm('Уверены что хотите удалить?'))
                      {
                        event.preventDefault();
                document.getElementById('delete-form-{{$album['category_id']}}').submit();
                          }
                      else{
                        event.preventDefault();
                      }" class="btn btn-outline-danger col-12" ><i class="fas fa-trash-alt"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <h4 class="p-3">Альбомов нет</h4>
            @endforelse
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-12">
        <div class="card card-widget">
          <div class="card-header">
            <h3 class="card-title">Последние видео</h3>
          </div>
          <div class="card-body p-0">
            <div class="row mx-0 text-center">
              @for($i=0; $i < 4; $i++)
                <div class="col-6 p-2 thumbs">
                  <img src="{{asset('images/person/artyshko.jpg')}}" class="shadow rounded img-fluid pad" alt="">
                  <div class="caption">
                    <span class="title">Заголовок видео</span>
                    <div class="mt-2 row">
                      <div class="col-6">
                        <a href="#" class="btn btn-outline-success col-12"><i class="fas fa-eye"></i></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-outline-danger col-12"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              @endfor
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop
