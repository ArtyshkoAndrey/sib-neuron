@extends('templates.app')
@section('style')
    #header{
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url(/images/header.jpeg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
@stop

@section('title', 'Вк, фото, видео')
 
@section('content')
<div id="header" class="position-relative overflow-hidden p-3 p-md-5 text-center text-white bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-5 font-weight-normal">Siberian neuron</h1>
    <p class="lead font-weight-normal">Загружайте свои фотографии и выбирайте шаблон слайд-шоу. Из них мы сделаем красивое видео, которое вы сможете скачать.</p>
    <a class="btn btn-outline-success text-white" href="/login">Создать проект</a>
  </div>
</div>
<section class="container py-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>Lorem ipsum.</h2>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam beatae possimus dolorum hic corporis laboriosam officiis eos saepe pariatur accusantium, minus praesentium sunt? Impedit molestias, expedita hic nihil voluptatem dicta repellat adipisci dolorem quam, ipsum aspernatur autem odio quibusdam sapiente dolor ea vero iusto nostrum pariatur laboriosam? Consequatur corrupti necessitatibus officia animi, nesciunt facere ullam suscipit, nam nulla. Magnam molestiae et sequi nobis ad, dolore necessitatibus ratione beatae eum nisi dolor at qui, a similique obcaecati velit est corporis quia. Iste explicabo id voluptatibus aut autem perspiciatis quaerat est voluptatum accusantium suscipit eveniet reprehenderit voluptates nam distinctio odio, mollitia voluptatem quod dolor ipsum praesentium. Quaerat magni aut, omnis, suscipit ut fuga optio earum, quos deleniti similique recusandae fugiat architecto incidunt provident obcaecati esse dolorum amet. Explicabo quod, impedit sapiente quidem magnam deleniti quos, voluptas architecto ducimus nam itaque, accusamus quisquam sequi eaque inventore totam consequatur amet, quam blanditiis tempore ad earum? Expedita quisquam recusandae itaque quam optio tempora voluptatem! Illo saepe, esse odit. Natus cum tempora autem alias deleniti nobis neque placeat sequi. Voluptate aspernatur itaque mollitia error, quod natus quidem aliquid vel pariatur quibusdam accusamus! Natus labore in qui pariatur, quidem at totam consequuntur distinctio minus, impedit. Fugit, provident.</p>
        </div>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166c2c610de%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166c2c610de%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22187%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
        </div>
    </div>
</section>
<section class="container py-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>Разработчики</h2>    
        </div>
    </div>
    <div class="row text-center py-5">
          <div class="col-md-4">
            <img class="rounded-circle" src="{{asset('images/person/artyshko.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h3 class="pt-2">Артышко Андрей</h3>
            <p>Тимлид, основатель сервиса, главный разработчик, разработчик серверной части сервиса, а так же нейроной сети</p>
            <p><a class="btn btn-secondary" href="https://artyshko.ru" role="button">Подробней »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-md-4">
            <img class="rounded-circle" src="{{asset('images/person/mironov.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h3 class="pt-2">Миронов Даниил</h3>
            <p>Фронтенд разраб. хз что дальше ден придумай сам</p>
            <p><a class="btn btn-secondary" href="https://vk.com/hugant" role="button">Подробней »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-md-4">
            <img class="rounded-circle" src="{{asset('images/person/sacyk.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h3 class="pt-2">Сацук Михаил</h3>
            <p>копирайтер</p>
            <p><a class="btn btn-secondary" href="https://vk.com/m1shaowned" role="button">Подробнее »</a></p>
          </div><!-- /.col-lg-4 -->
        </div>
</section>

@stop