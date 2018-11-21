@extends('dashboard.templates.app')

@section('title', "Видео " . Auth::user()->screen_name)

@section('style')
  #alert {
    display: none;
  }
@stop

@section('content')
<section class="content">
	<div class="container-fluid">
		<h2>Создать Видео</h2>
		<div id="alert" class="alert alert-info alert-dismissible">
      
	  </div>
		<div class="modal1 modal fade" data-backdrop="static" data-focus="true" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
				<span class="fa fa-spinner fa-spin fa-3x text-white"></span>
			</div>
		</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">Информация</h3>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
								Наш сервис создаст видео из выбранного вами альбома
									<form method="POST" id="contactform">
										@csrf
										<div class="form-group">
											<label>Выберите альбом</label>
											<select class="form-control" id="cat_id">
												<option value="1" selected>Собаки</option>
												<option value="2">Люди</option>
											</select>
										</div>
										<button type="submit" name="submit" class="btn btn-block btn-primary col-sm-3 col-12 mt-2">Создать</button>
									</form>
								</div>
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- ./card -->
				</div>
			</div>
		</div>
	</section>

@stop

@section('script')
	<script>
      $(document).ready(function(){
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $("#contactform").on('submit', function(e){
              e.preventDefault();
              $('.modal1').modal('show');
              console.log('Фотки начались обрабатываться');
              $.ajax({
                  /* the route pointing to the post function */
                  url: '{{route("video.store")}}',
                  type: 'POST',
                  /* send the csrf-token and the input to the controller */
                  // data: {_token: CSRF_TOKEN, label:$(".label:checked").val(), image:$('#image')},
                  data: {_token: CSRF_TOKEN, category_id: $('#cat_id').val()},
                  dataType: 'JSON',
                  /* remind that 'data' is the response of the AjaxController */
                  success: function (data) {
					setTimeout(function() {
                      $('.modal1').modal('hide');
                      $("#alert")[0].innerHTML = '<h5><i class="icon fa fa-info"></i> Видео создаётся!</h5>';
                      $('#alert').show();
                    }, 1000);

                    setTimeout(function() {
                      $("#alert").hide(1000);
                    }, 6000); 
                  },
                  error: function (error) {
					setTimeout(function() {
                      $('.modal1').modal('hide');
                      $("#alert")[0].innerHTML = '<h5><i class="icon fa fa-info"></i> Ошибка!</h5> Ошибка создания видео';
                      $("#alert").show(1000);
                    }, 1000);

                    setTimeout(function() {
                      $("#alert").hide(1000);
                    }, 6000);
                  }

              });
          });
      });
	</script>
@stop

