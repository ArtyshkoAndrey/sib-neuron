@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

@section('content')

	<section class="content">
		<div class="container-fluid">
			<h2>Ваши Видео</h2>

		</div>
	</section>

@stop
