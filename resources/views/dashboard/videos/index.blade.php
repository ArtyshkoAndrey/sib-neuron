@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

@section('content')

	<section class="content">
		<div class="container-fluid">
			<h2>Ваши Видео</h2>
			@forelse($albums as $album)
				{{$album}}
			@empty
				<p>Нет видео</p>

			@endforelse
		</div>
	</section>

@stop
