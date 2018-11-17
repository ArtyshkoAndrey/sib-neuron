@extends('dashboard.templates.app')

@section('title', "Фотографии " . Auth::user()->screen_name)

@section('style')
  /*------------------------------------*\
      MATERIAL PHOTO GALLERY
  \*------------------------------------*/
  .m-p-g {
    max-width: 100%;
    margin: 0 auto;
  }
  .m-p-g__thumbs-img {
    margin: 0;
    float: left;
    vertical-align: bottom;
    cursor: pointer;
    z-index: 1;
    position: relative;
    opacity: 0;
    -webkit-filter: brightness(100%);
            filter: brightness(100%);
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    will-change: opacity, transform;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  }
  .m-p-g__thumbs-img.active {
    z-index: 50;
  }
  .m-p-g__thumbs-img.layout-completed {
    opacity: 1;
  }
  .m-p-g__thumbs-img.hide {
    opacity: 0;
  }
  .m-p-g__thumbs-img:hover {
    -webkit-filter: brightness(110%);
            filter: brightness(110%);
  }
  .m-p-g__fullscreen {
    position: fixed;
    z-index: 199;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0);
    visibility: hidden;
    transition: background 0.25s ease-out, visibility 0.01s 0.5s linear;
    will-change: background, visibility;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
  }
  .m-p-g__fullscreen.active {
    transition: background .25s ease-out, visibility .01s 0s linear;
    visibility: visible;
    background: rgba(0, 0, 0, 0.95);
  }
  .m-p-g__fullscreen-img {
    pointer-events: none;
    position: absolute;
    -webkit-transform-origin: left top;
            transform-origin: left top;
    top: 50%;
    left: 50%;
    max-height: 100vh;
    max-width: 100%;
    visibility: hidden;
    will-change: visibility;
    transition: opacity 0.5s ease-out;
  }
  .m-p-g__fullscreen-img.active {
    visibility: visible;
    opacity: 1 !important;
    transition: opacity 0.5s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease-out;
    transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  }
  .m-p-g__fullscreen-img.almost-active {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) !important;
            transform: translate3d(0, 0, 0) !important;
  }
  .m-p-g__controls {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 200;
    height: 20vh;
    background: linear-gradient(to top, transparent 0%, rgba(0, 0, 0, 0.55) 100%);
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  }
  .m-p-g__controls.active {
    opacity: 1;
    visibility: visible;
  }
  .m-p-g__controls-close, .m-p-g__controls-arrow {
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
    border: none;
    background: none;
  }
  .m-p-g__controls-close:focus, .m-p-g__controls-arrow:focus {
    outline: none;
  }
  .m-p-g__controls-arrow {
    position: absolute;
    z-index: 1;
    top: 0;
    width: 20%;
    height: 100vh;
    display: flex;
    align-items: center;
    cursor: pointer;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    opacity: 0;
  }
  .m-p-g__controls-arrow:hover {
    opacity: 1;
  }
  .m-p-g__controls-arrow--prev {
    left: 0;
    padding-left: 3vw;
    justify-content: flex-start;
  }
  .m-p-g__controls-arrow--next {
    right: 0;
    padding-right: 3vw;
    justify-content: flex-end;
  }
  .m-p-g__controls-close {
    position: absolute;
    top: 3vh;
    left: 3vw;
    z-index: 5;
    cursor: pointer;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
  .m-p-g__btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.07);
    transition: all .25s ease-out;
  }
  .m-p-g__btn:hover {
    background: rgba(255, 255, 255, 0.15);
  }
  .m-p-g__alertBox {
    position: fixed;
    z-index: 999;
    max-width: 700px;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    background: white;
    padding: 25px;
    border-radius: 3px;
    text-align: center;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.23), 0 10px 40px rgba(0, 0, 0, 0.19);
    color: grey;
  }
  .m-p-g__alertBox h2 {
    color: red;
  }

  .m-p-g__thumbs {
     /* Prevent vertical gaps */
     line-height: 0;

     -webkit-column-count: 5;
     -webkit-column-gap:   0px;
     -moz-column-count:    5;
     -moz-column-gap:      0px;
     column-count:         5;
     column-gap:           0px;
  }

  .m-p-g__thumbs img {
    /* Just in case there are inline attributes */
    width: 100% !important;
    height: auto !important;
  }

  @media (max-width: 1200px) {
    .m-p-g__thumbs {
    -moz-column-count:    3;
    -webkit-column-count: 3;
    column-count:         3;
    }
  }
  @media (max-width: 1000px) {
    #photos {
    -moz-column-count:    5;
    -webkit-column-count: 5;
    column-count:         5;
    }
  }
  @media (max-width: 800px) {
    .m-p-g__thumbs {
    -moz-column-count:    4;
    -webkit-column-count: 4;
    column-count:         4;
    }
  }
  @media (max-width: 400px) {
    .m-p-g__thumbs {
    -moz-column-count:    2;
    -webkit-column-count: 2;
    column-count:         2;
    }
  }
@stop

@section('content')

{{$albumsName->name}}

<div class="container-fluid">
  <div class="row">
      <div class="m-p-g">
        <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
          @foreach($photos as $photo)
            <img src="{{ $photo['th_url'] }}" data-full="{{ $photo['url'] }}" class="m-p-g__thumbs-img img-thumbnail" />
          @endforeach
        </div>

        <div class="m-p-g__fullscreen"></div>
      </div>
    </div>
  </div>

@stop

@section('script')
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js"></script>
  <script>
      var elem = document.querySelector('.m-p-g');

      document.addEventListener('DOMContentLoaded', function() {
          var gallery = new MaterialPhotoGallery(elem);
      });
  </script>
@stop