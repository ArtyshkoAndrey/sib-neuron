@extends('dashboard.templates.app')

@section('title', "Альбомы " . Auth::user()->screen_name)

@section('content')

<section class="content">
  <div class="container-fluid">
    <h2>Создать Альбомов</h2>

    <div class="row">
    	<div class="col-12">
	        <div class="card">
	          <div class="card-header d-flex p-0">
	            <h3 class="card-title p-3">Информация</h3>
	          </div><!-- /.card-header -->
	          <div class="card-body">
	            <div class="tab-content">
	              <div class="tab-pane active" id="tab_1">
	                A wonderful serenity has taken possession of my entire soul,
	                like these sweet mornings of spring which I enjoy with my whole heart.
	                I am alone, and feel the charm of existence in this spot,
	                which was created for the bliss of souls like mine. I am so happy,
	                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
	                that I neglect my talents. I should be incapable of drawing a single stroke
	                at the present moment; and yet I feel that I never was a greater artist than now.
        					<form method="POST" id="contactform">
                    @csrf
                    <input type="text" name="123123" id="123123123" value="1123123123">
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
              console.log('Фотки начались обрабатываться');
              $.ajax({
                  /* the route pointing to the post function */
                  url: 'http://sib-neuron.loc/user/photo/albums/store',
                  type: 'POST',
                  /* send the csrf-token and the input to the controller */
                  // data: {_token: CSRF_TOKEN, label:$(".label:checked").val(), image:$('#image')},
                  data: $('#contactform').serialize(),
                  dataType: 'JSON',
                  /* remind that 'data' is the response of the AjaxController */
                  success: function (data) { 
                      console.log('Фотки обработылись');
                  }
              }); 
          });
     });    
  </script>
@stop