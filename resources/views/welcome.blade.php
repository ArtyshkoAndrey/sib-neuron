@extends('templates.app')
@section('style')
    #header{
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url(/images/header.jpeg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
@stop

@section('title', 'Вк, фото, видео')
 
@section('content')
<div id="header" class="position-relative overflow-hidden p-3 p-md-5 text-center text-white bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-5 font-weight-normal">Siberian neuron</h1>
    <p class="lead font-weight-normal">Загружайте свои фотографии и выбирайте шаблон слайд-шоу. Из них мы сделаем красивое видео, которое вы сможете скачать.</p>
    <a class="btn btn-outline-success text-white" href="/login">Создать проект</a>
  </div>
</div>
<section class="container py-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>Надежное хранилище </h2>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-12">
            <div class="p text-center">
                Фото и видео с разрешением до 16 Мпикс. и 1080p HD можно бесплатно загружать в неограниченном количестве в надежное хранилище. Они доступны вам в любое время с любого телефона, планшета или компьютера на сайте photos.google.com.
            </div>
        </div>
    </div>
</section>
<section class="container h-100">
    <div class="d-flex flex-row">
        <div class="d-flex flex-column col-md-7 align-self-center">
            <p>Всегда приятно получить в подарок от близкого человека видеоролик, сделанный из совместных фотографий. Да и преподнести кому-нибудь такой подарок не менее приятно, ведь создание видеоролика из фотографий своими руками – очень интересный и увлекательный процесс.</p>
            <p>Превратите свой цифровой фотоальбом в яркое и запоминающееся слайд-шоу с Видеоредактором Movavi! Чтобы самостоятельно создать видео из фото, вам нужно скачать программу и выполнить всего пять простых шагов.</p>
        </div>
        <div class="d-flex flex-column col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166c2c610de%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166c2c610de%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22187%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
        </div>
    </div>
</section>
<section class="container-fluid h-100 my-5 py-5" style="background-color: #f7f7f9">
  <div class="row text-center">
    <div class="col-12">
      <h2>Разработчики</h2>    
    </div>
  </div>
  <div class="row">
    <div class="col-10 offset-1">
      <div class="d-flex flex-row text-center py-5">
        <div class="d-flex flex-column col-md-4 align-items-center">
          <img class="rounded-circle block-center" src="{{asset('images/person/artyshko.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h3 class="pt-2">Артышко Андрей</h3>
          <p class="text">Тимлид, основатель сервиса, главный разработчик, разработчик серверной части сервиса, а так же нейроной сети</p>
          <a class="btn btn-secondary mt-auto" target="_blank" href="https://artyshko.ru" role="button">Подробней »</a>
        </div>
        <div class="d-flex flex-column col-md-4 align-items-center">
          <img class="rounded-circle" src="{{asset('images/person/mironov.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h3 class="pt-2">Миронов Даниил</h3>
          <p class="text">Фронтенд разраб. хз что дальше ден придумай сам</p>
          <a class="btn btn-secondary mt-auto" target="_blank" href="https://vk.com/hugant" role="button">Подробней »</a>
        </div><!-- /.col-lg-4 -->
        <div class="d-flex flex-column col-md-4 align-items-center">
          <img class="rounded-circle" src="{{asset('images/person/sacyk.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h3 class="pt-2">Сацук Михаил</h3>
          <p class="text">копирайтер</p>
          <a class="btn btn-secondary mt-auto" target="_blank" href="https://vk.com/m1shaowned" role="button">Подробнее »</a>
        </div><!-- /.col-lg-4 -->
      </div>        
    </div>
  </div>
</section>

@stop