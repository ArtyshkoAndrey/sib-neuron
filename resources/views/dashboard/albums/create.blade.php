\\
@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

@section('style')
  #alert {
    display: none;
  }
@stop

@section('content')

<section class="content">
  <div class="container-fluid">
    <h2>Создать Альбом</h2>
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
	                Наш сервис создаст для два альбома фотографий, с собаками и людьми. В данный момент есть погрешности в определение, поэтому не обижайтесь если наш сервис назавет вас собакой :) 
        					<form method="POST" id="contactform">
                    @csrf
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
          $("#contactform").on('submit', function(e){
              e.preventDefault();
              $('.modal1').modal('show');
              $.ajax({
                  /* the route pointing to the post function */
                  url: '{{route("albums.store")}}',
                  type: 'POST',  
                  /* send the csrf-token and the input to the controller */
                  // data: {_token: CSRF_TOKEN, label:$(".label:checked").val(), image:$('#image')},
                  data: $('#contactform').serialize(),
                  dataType: 'JSON',
                  /* remind that 'data' is the response of the AjaxController */
                  success: function (data) {
                    setTimeout(function() {
                      $('.modal1').modal('hide');
                      $("#alert")[0].innerHTML = '<h5><i class="icon fa fa-info"></i> Обработка!</h5>' + data.label;
                      $('#alert').show();
                    }, 1000);

                    setTimeout(function() {
                      $("#alert").hide(1000);
                    }, 6000);                    
                  },
                  error: function (error) {
                    setTimeout(function() {
                      $('.modal1').modal('hide');
                      $("#alert")[0].innerHTML = '<h5><i class="icon fa fa-info"></i> Обработка!</h5> Ошибка обработки фотографий';
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