@extends('templates.app')

@section('style')
	@font-face {
		font-family: 'Brandon Grotesque Medium';
		src: url({{asset("fonts/'BrandonGrotesque-Medium.eot")}});
		src: url({{asset("fonts/BrandonGrotesque-Medium.eot?#iefix")}}) format('embedded-opentype'),
				 url({{asset("fonts/BrandonGrotesque-Medium.woff")}}) format('woff'),
				 url({{asset("fonts/BrandonGrotesque-Medium.ttf")}}) format('truetype');
		font-weight: normal;
		font-style: normal;
	}
    {{--#header{--}}
        {{--background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url(/images/header.jpeg);--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-position: center;--}}
        {{--background-size: cover;--}}
    {{--}--}}

	h1, h2, h3, h4, h5, h6 {
		font-family: Brandon Grotesque Medium;
		text-transform: capitalize;
		text-align: center;
	}

	.navbar {
		position: absolute;
		width: 100%;
		background: transparent !important;
		z-index: 1;
	}

	.navbar form .btn {
		color: #44a5ff;
		border-color: #44a5ff;
	}

	.navbar form .btn:hover {
		background-color: #44a5ff;
		color: white;
	}

	.navbar form .btn:active {
		background-color: #44a5ff !important;
		color: white;
		border-color: #44a5ff !important;
		outline-color: #44a5ff !important;
	}
	.preview,
	.preview .background,
	.preview .filter {
		width: 100%;
		height: 100vh;
	}

	.preview {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.preview .background {
		position: absolute;
{{--		background: url({{asset("images/preview-background.jpeg")}});--}}
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
	}

	.preview .filter {
		position: absolute;
		background: #0000006e;
	}

	.preview .content {
		position: relative;
		color: white;
		text-align: center;
	}

	.preview .content h1 {
		font-size: 40pt;
	}

	.preview .content .btn {
		margin-top: 2rem;
		background: #2a6faf;
		color: white;
	}

	.preview .icon {
		position: absolute;
		bottom: 10px;
		color: white;
	}

	.steps .wrapper {
		height: 100%;
		padding: 2rem 1rem;
		border: 1px solid #90948a;
		border-radius: 20px;
		-webkit-box-shadow: 6px 17px 37px 1px rgba(0,0,0,0.12);
			 -moz-box-shadow: 6px 17px 37px 1px rgba(0,0,0,0.12);
						box-shadow: 6px 17px 37px 1px rgba(0,0,0,0.12);
	}

	.steps .wrapper .icon {
		font-size: 50pt;
		text-align: center;
	}

	.steps .wrapper .text {
		display: flex;
		align-items: center;
		justyfy-content: center;
		text-align: center;
	}
@stop

@section('title', 'Вк, фото, видео')
 
@section('content')
	<section class="preview">
		<div class="background" data-parallax="scroll" data-image-src={{asset("images/preview-background.jpeg")}}></div>
		<div class="filter"></div>
		<div class="content">
			<h1>Make your photos alive</h1>
			<h3>Create videos from your photos in VK</h3>
			<button class="btn">Make your video</button>
		</div>
		<span class="icon"><i class="fas fa-arrow-down"></i></span>
	</section>
	<section class="steps">
		<div class="container mt-4">
			<h1>Easy 3 steps</h1>
			<div class="row mt-4">
				<div class="col-sm-4 col-12">
					<div class="wrapper">
						<div class="title">
							<h4>Step 1</h4>
						</div>
						<div class="icon">
							<i class="fas fa-sign-in-alt"></i>
						</div>
						<div class="text">
							<p>Login with VK</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-12">
					<div class="wrapper">
						<div class="title">
							<h4>Step 2</h4>
						</div>
						<div class="icon">
							<i class="fas fa-images"></i>
						</div>
						<div class="text">
							<p>Select a photo album. Our service will divide your photos into two categories: dogs and people.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-12">
					<div class="wrapper">
						<div class="title">
							<h4>Step 3</h4>
						</div>
						<div class="icon">
							<i class="fas fa-download"></i>
						</div>
						<div class="text">
							<p>Get the video and download it.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="developers">

	</section>
{{--<div id="header" class="position-relative overflow-hidden p-3 p-md-5 text-center text-white bg-light">--}}
  {{--<div class="col-md-5 p-lg-5 mx-auto my-5">--}}
    {{--<h1 class="display-5 font-weight-normal">Siberian neuron</h1>--}}
    {{--<p class="lead font-weight-normal">Загружайте свои фотографии и выбирайте шаблон слайд-шоу. Из них мы сделаем красивое видео, которое вы сможете скачать.</p>--}}
    {{--<a class="btn btn-outline-success text-white" href="{{ route('login') }}">Создать проект</a>--}}
  {{--</div>--}}
{{--</div>--}}
{{--<section class="container py-5">--}}
    {{--<div class="row text-center">--}}
        {{--<div class="col-12">--}}
            {{--<h2>Надежное хранилище </h2>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row py-3">--}}
        {{--<div class="col-12">--}}
            {{--<div class="p text-center">--}}
                {{--Фото и видео можно бесплатно загружать в неограниченном количестве в надежное хранилище. Они доступны вам в любое время с любого телефона, планшета или компьютера.--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<section class="container h-100">--}}
    {{--<div class="d-flex flex-row row">--}}
        {{--<div class="d-flex flex-column col-md-7 align-self-center">--}}
            {{--<p>Всегда приятно получить в подарок от близкого человека видеоролик, сделанный из совместных фотографий. Да и преподнести кому-нибудь такой подарок не менее приятно, ведь создание видеоролика из фотографий своими руками – очень интересный и увлекательный процесс.</p>--}}
            {{--<p>Превратите свой цифровой фотоальбом в яркое и запоминающееся слайд-шоу! Чтобы самостоятельно создать видео из фото, вам нужно скачать программу и выполнить всего пять простых шагов.</p>--}}
        {{--</div>--}}
        {{--<div class="d-flex flex-column col-md-5">--}}
            {{--<img class="featurette-image img-fluid mx-auto" src="{{ asset('images/Siberian Neuron.jpg') }}">--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<section class="container-fluid h-100 my-5 py-5" style="background-color: #f7f7f9">--}}
  {{--<div class="row text-center">--}}
    {{--<div class="col-12">--}}
      {{--<h2>Разработчики</h2>    --}}
    {{--</div>--}}
  {{--</div>--}}
  {{--<div class="row">--}}
    {{--<div class="col-10 offset-1">--}}
      {{--<div class="d-flex flex-row row text-center">--}}
        {{--<div class="d-flex flex-column col-md-4 align-items-center my-5">--}}
          {{--<img class="rounded-circle block-center" src="{{asset('images/person/artyshko.jpg')}}" alt="Generic placeholder image" width="140" height="140">--}}
          {{--<h3 class="pt-2">Артышко Андрей</h3>--}}
          {{--<p class="text">Тимлид, основатель сервиса, главный разработчик, разработчик серверной части сервиса, а так же нейроной сети</p>--}}
          {{--<a class="btn btn-secondary mt-auto" target="_blank" href="https://artyshko.ru" role="button">Подробней »</a>--}}
        {{--</div>--}}
        {{--<div class="d-flex flex-column col-md-4 align-items-center my-5">--}}
          {{--<img class="rounded-circle" src="{{asset('images/person/mironov.jpg')}}" alt="Generic placeholder image" width="140" height="140">--}}
          {{--<h3 class="pt-2">Миронов Даниил</h3>--}}
          {{--<p class="text">Фронтенд разраб. хз что дальше ден придумай сам</p>--}}
          {{--<a class="btn btn-secondary mt-auto" target="_blank" href="https://vk.com/hugant" role="button">Подробней »</a>--}}
        {{--</div><!-- /.col-lg-4 -->--}}
        {{--<div class="d-flex flex-column col-md-4 align-items-center my-5">--}}
          {{--<img class="rounded-circle" src="{{asset('images/person/sacyk.jpg')}}" alt="Generic placeholder image" width="140" height="140">--}}
          {{--<h3 class="pt-2">Сацук Михаил</h3>--}}
          {{--<p class="text">копирайтер</p>--}}
          {{--<a class="btn btn-secondary mt-auto" target="_blank" href="https://vk.com/m1shaowned" role="button">Подробнее »</a>--}}
        {{--</div><!-- /.col-lg-4 -->--}}
      {{--</div>        --}}
    {{--</div>--}}
  {{--</div>--}}
{{--</section>--}}

@stop
