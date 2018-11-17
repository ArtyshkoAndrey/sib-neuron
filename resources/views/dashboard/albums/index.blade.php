@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

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
@stop

@section('content')

<section class="content">
  <div class="container-fluid">
		<div class="card card-widget">
			<div class="card-header">
				<h2 class="card-title">Ваши Альбомы</h2>
			</div>
			<div class="card-body p-0">
				<div class="row ml-0 mr-0 text-center">
					@forelse($albums as $album)
						<div class="col-md-3 col-sm-6 col-6 p-2 thumbs">
							<img src="{{$album['album_first_photo']->url}}" class="shadow rounded img-fluid pad" alt="" style="object-fit: cover; width: 256px; height: 256px;">
							<div class="caption">
								<span class="title">{{$album['category_name']}}</span>
								<div class="mt-2 row">
									<div class="col-6">
										<a href="{{ route('albums.show', $album['category_id']) }}" class="btn btn-outline-success col-12"><i class="fas fa-eye"></i></a>
									</div>
									<div class="col-6">
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
						<h4>Альбомов нет</h4>
					@endforelse
				</div>
			</div>
		</div>
  </div>
</section>

@stop
