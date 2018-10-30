@extends('templates.app')
@section('style')
  #header{
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url(/images/header.jpeg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
@stop

@section('title', 'Обучение нейронной сети')
 
@section('content')
<div id="header" class="position-relative overflow-hidden p-3 p-md-5 text-center text-white bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <p class="lead font-weight-normal">Помогите обучить нейронную сеть</p>
  </div>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 pt-2">
        <form action='{{ route("train") }}' method="post" enctype="multipart/form-data">
           @csrf
          <div class="form-group">
              <img src="{{ $im }}" class="img-fluid" alt="">
            <label for="exampleFormControlFile1">Загрузите фотографию для обучения</label>
            <input type="text" name="image" value="{{ $im }}" id="exampleFormControlFile1" hidden>
            <select name="label" id="">
              <option value="people">Человек</option>
              <option value="dog">собака</option>
              <option value="error">Нету</option>
            </select>
            <input type="submit" value="Отправить">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@stop
