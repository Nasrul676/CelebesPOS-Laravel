@extends('master_layout.link')
<div class="ngeblur" style="width:100%; height:100vh; z-index:-1; background-image: url({{asset('assets/img/404.gif')}});background-size: 100% ;position:fixed; background-position: center;
  background-repeat: no-repeat;  background-color: rgba(0,0,0, 0.4);">
</div>
<div class="text-center">
  <br>
  <br>
  {{-- <div class="error mx-auto mb-5" data-text="404">404</div> --}}
  <h2 style="font-size:40px; font-style: bold;" class="text-danger">Upss, Anda Belum Login...!!!</h2>
  <p class="text-info mb-5">Mohon Untuk Login Dulu...!!!</p>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <a class="btn btn-outline-dark" href="{{route('login')}}">&larr; login</a>
</div>