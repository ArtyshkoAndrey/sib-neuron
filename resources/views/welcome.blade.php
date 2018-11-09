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
    <a class="btn btn-outline-success text-white" href="{{ route('login') }}">Создать проект</a>
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
                Фото и видео можно бесплатно загружать в неограниченном количестве в надежное хранилище. Они доступны вам в любое время с любого телефона, планшета или компьютера.
            </div>
        </div>
    </div>
</section>
<section class="container h-100">
    <div class="d-flex flex-row row">
        <div class="d-flex flex-column col-md-7 align-self-center">
            <p>Всегда приятно получить в подарок от близкого человека видеоролик, сделанный из совместных фотографий. Да и преподнести кому-нибудь такой подарок не менее приятно, ведь создание видеоролика из фотографий своими руками – очень интересный и увлекательный процесс.</p>
            <p>Превратите свой цифровой фотоальбом в яркое и запоминающееся слайд-шоу! Чтобы самостоятельно создать видео из фото, вам нужно скачать программу и выполнить всего пять простых шагов.</p>
        </div>
        <div class="d-flex flex-column col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/Siberian Neuron.jpg') }}">
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
      <div class="d-flex flex-row row text-center">
        <div class="d-flex flex-column col-md-4 align-items-center my-5">
          <img class="rounded-circle block-center" src="{{asset('images/person/artyshko.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h3 class="pt-2">Артышко Андрей</h3>
          <p class="text">Тимлид, основатель сервиса, главный разработчик, разработчик серверной части сервиса, а так же нейроной сети</p>
          <a class="btn btn-secondary mt-auto" target="_blank" href="https://artyshko.ru" role="button">Подробней »</a>
        </div>
        <div class="d-flex flex-column col-md-4 align-items-center my-5">
          <img class="rounded-circle" src="{{asset('images/person/mironov.jpg')}}" alt="Generic placeholder image" width="140" height="140">
          <h3 class="pt-2">Миронов Даниил</h3>
          <p class="text">Фронтенд разраб. хз что дальше ден придумай сам</p>
          <a class="btn btn-secondary mt-auto" target="_blank" href="https://vk.com/hugant" role="button">Подробней »</a>
        </div><!-- /.col-lg-4 -->
        <div class="d-flex flex-column col-md-4 align-items-center my-5">
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
