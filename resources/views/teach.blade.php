@extends('templates.app')
@section('style')
    #header{
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url(/images/header.jpeg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    }
@stop

@section('title', 'Обучение нейронной сети')

@section('content')
    <div id="header" class="position-relative overflow-hidden p-3 p-md-5 text-center text-white bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <p class="lead font-weight-normal">Помогите обучить нейронную сеть</p>
        </div>
    </div>
    <section>
        <div class="modal1 modal fade" data-backdrop="static" data-focus="true" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
                <span class="fa fa-spinner fa-spin fa-3x text-white"></span>
            </div>
        </div>
        <div class="modal2 modal fade bd-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" data-focus="true" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center" role="document">
                <!-- <span class="fa fa-spinner fa-spin fa-3x text-white"></span> -->
                <div class="modal-content" style="height:90vh">
                    <iframe src="https://100js.artyshko.ru/day/arkanoid"  style="height:90vh" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 p-2">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                    <form method="POST" id="contactform">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group text-center">
                            <img src="{{ $im }}" class="img-thumbnail" alt="images" id="trainImage" style="max-height: 300px;">
                            <input type="hidden" name="image" value="{{ $im }}" id="image">
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary m-1 ">
                                    <input type="radio" class="label" name="options" id="option1" value="people" autocomplete="off"> Человек
                                </label>
                                <label class="btn btn-secondary m-1">
                                    <input type="radio" class="label" name="options" id="option2" value="dog" autocomplete="off"> Собака
                                </label>
                                <label class="btn btn-secondary m-1">
                                    <input type="radio" class="label" name="options" id="option3" value="error" autocomplete="off"> Нет
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="train" class="btn btn-primary btn-block">Отправить</button>

                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#ruleModal">
                            Правила обучения
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="ruleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Правила обучения</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="jumbotron">
                            <h1 class="display-4">Привет Друг!</h1>
                            <p class="lead">Спасибо, что зашёл на этот сайт. Если желаешь помочь развитию проекта, то необходимо следовать некоторым правилам</p>
                            <hr class="my-4">
                            <p>В центре размещена картинки. Требуется внимательно посмотреть её, а выбрать вариант ответа</p>
                            <ul>
                                <li>1. Человек - если человека хорошо виндо на фотографии. Присутствуют руки, плечи голова.</li>
                                <li>2. Собака - как ты понял, собаку. Желательно что бы на фотографии была одна собака, и без посторонних людей</li>
                                <li>3. Нет - это означает что на фотографии нет ни собаки ни человека.</li>
                            </ul>
                            <p>Так как обучение длиться долго, Вы можете поиграть в игру Arkanoid, полная версия игры на сайте <a href="https://100js.artyshko.ru/day/arkanoid" target="_blank">100js</a></p>
                            <p>Для смартфонов игра не доступна, в связи с адаптацией</p>
                            <div class="row p-2">
                                <div class="col-sm-6">
                                    <img src="{{asset('images/game/1.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/game/2.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="{{url('https://vk.com/fulliton')}}" role="button">Написать отзыв</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')
    <script>
        $(document).ready(function(){
            $('#ruleModal').modal('toggle')
            // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#contactform").on('submit', function(e){
                e.preventDefault();
                if($('.label:checked').val() !== 'error') {
                    if($(window).width() > '1000')
                        $('.modal2').modal('show');
                    else
                       $('.modal1').modal('show');
                } else {
                    $('.modal1').modal('show');
                }
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/api/train',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    // data: {_token: CSRF_TOKEN, label:$(".label:checked").val(), image:$('#image')},
                    data: $('#contactform').serialize(),
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $("#trainImage").attr("src",data.im);
                        $("#image").val(data.im);
                        console.log(data.msg + " " + data.im);
                        setTimeout(function () {
                            $('.modal2').modal('hide');
                            $('.modal1').modal('hide');
                            $('.label').prop('checked', false);
                            $('label').removeClass('active');
                        }, 1000);
                    }
                }); 
            });
       });    
    </script>
@stop