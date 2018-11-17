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

	/* width */
	::-webkit-scrollbar {
		width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
		background: #f1f1f1;
	}

	/* Handle */
	::-webkit-scrollbar-thumb {
		background: #888;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
		background: #555;
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

	.preview .content .btn,
	.developers .btn,
	.steps .text .btn {
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
		border: 1px solid #d8d8d8;
		border-radius: 20px;
		-webkit-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.1);
			 -moz-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.1);
						box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.1);
		-webkit-transition: background .3s,border .3s,-webkit-border-radius .3s,-webkit-box-shadow .3s;
		transition: background .3s,border .3s,-webkit-border-radius .3s,-webkit-box-shadow .3s;
		-o-transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
		transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
		transition: background .3s,border .3s,border-radius .3s,box-shadow .3s,-webkit-border-radius .3s,-webkit-box-shadow .3s;
	}

	.steps .wrapper:hover {
		box-shadow: 0px 0px 35px 0px rgba(0,0,0,0.36);
	}

	.steps .wrapper .icon {
		font-size: 50pt;
		text-align: center;
		color: #2a6faf;
	}

	.steps .wrapper .text {
		text-align: center;
	}

	.developers .name {
		font-family: inherit;
	}

	footer .small {
		color: white !important;
	}

	footer a {
		color: white;
		text-decoration: underline;
	}

	footer a:hover {
		color: lightgray;
	}

	footer ul a {
		text-decoration: none;
	}

	footer ul a:hover {
		color: lightgray;
		text-decoration: none;
	}

	@media (max-width: 768px) {
		.navbar {
			background: #343a40 !important;
		}

		footer ul {
			display: flex;
			justify-content: space-evenly;
		}
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
			<a href="{{route('login')}}" class="btn">Make your video</a>
		</div>
		<span class="icon"><i class="fas fa-arrow-down"></i></span>
	</section>
	<section class="steps">
		<div class="container mt-4">
			<h1>Easy 3 steps</h1>
			<div class="row mt-4">
				<div class="col-sm-4 col-12 mt-2">
					<div class="wrapper">
						<div class="title">
							<h4>Step 1</h4>
						</div>
						<div class="icon">
							<i class="fas fa-sign-in-alt"></i>
						</div>
						<div class="text">
							<p>Login with VK</p>
							<a href="{{route('login')}}" class="btn">Make your video</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-12 mt-2">
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
				<div class="col-sm-4 col-12 mt-2">
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
	<section class="developers mt-5">
		<div class="container">
			<h1>Developers</h1>
			<div class="row">
				<div class="col-sm-6 col-12 d-flex flex-column align-items-center p-5">
					<img class="rounded-circle block-center" src="{{asset('images/person/artyshko.jpg')}}" width="250" height="250">
					<h3 class="name pt-2">Артышко Андрей</h3>
					<p class="text text-center">{{--Тимлид, основатель сервиса, главный разработчик, разработчик серверной части сервиса, а так же нейроной сети--}}Teamlead, the founder of the service, the main developer, the developer of the server part of the service, as well as the neural network</p>
					<a class="btn mt-auto" target="_blank" href="https://artyshko.ru" role="button">Details »</a>
				</div>
				<div class="col-sm-6 col-12 d-flex flex-column align-items-center p-5">
					<img class="rounded-circle block-center" src="{{asset('images/person/hugant.jpeg')}}" width="250" height="250">
					<h3 class="name pt-2">Миронов Даниил</h3>
					<p class="text text-center">Frontend, design and development of landing page and some other modules</p>
					<a class="btn mt-auto" target="_blank" href="https://hugant.github.io" role="button">Details »</a>
				</div>
			</div>
		</div>
	</section>
@stop
