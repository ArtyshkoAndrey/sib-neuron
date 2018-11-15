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
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 pt-2">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action='{{ route("train") }}' method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center">
                            <img src="{{ $im }}" class="img-thumbnail" alt="images" style="max-height: 300px;">
                            <input type="text" name="image" value="{{ $im }}" id="exampleFormControlFile1" hidden>
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary m-1 ">
                                    <input type="radio" name="options" id="option1" value="people" autocomplete="off"> Человек
                                </label>
                                <label class="btn btn-secondary m-1">
                                    <input type="radio" name="options" id="option2" value="dog" autocomplete="off"> Собака
                                </label>
                                <label class="btn btn-secondary m-1">
                                    <input type="radio" name="options" id="option3" value="error" autocomplete="off"> Нет
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                    </form>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-sm-10 offset-sm-1">
                    <div class="jumbotron">
                        <h1 class="display-4">Привет Друг!</h1>
                        <p class="lead">Спасибо, что за зашёл на этот сайт. Если желаешь помочь развитию проекта, то необходимо следовать некоторым правилам</p>
                        <hr class="my-4">
                        <p>В центре размещена картинки. Требуется внимательно посмотреть её, а выбрать вариант ответа</p>
                        <ul>
                            <li>1. Человек - если человека хорошо виндо на фотографии. Присутствуют руки, плечи голова.</li>
                            <li>2. Собака - как ты понял, собаку. Желательно что бы на фотографии была одна собака, и без посторонних людей</li>
                            <li>3. Нет - это означает что на фотографии нет ни собаки ни человека.</li>
                        </ul>

                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{url('https://vk.com/fulliton')}}" role="button">Написать отзыв</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
