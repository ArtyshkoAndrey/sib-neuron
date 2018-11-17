@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

@section('style')
	.
@stop

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Размер видео</span>
							<span class="info-box-number">1.4Мб</span>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Длительность</span>
							<span class="info-box-number">3 минуты</span>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Фотографий</span>
							<span class="info-box-number">34</span>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h2>Просмотр видео</h2>
				</div>

				<div class="card-body p-2">
					<video width="100%" height="100%" controls="controls" poster="" src="">
						<a href="#">Скачать видео</a>
					</video>
				</div>
			</div>
		</div>

	</section>
@stop