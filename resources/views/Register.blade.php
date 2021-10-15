@extends('master_layout.link')
@section('judul', 'Daftar Akun')
<div class="ngeblur" style="width:100%; height:100vh; filter:blur(8px); z-index:-1; background-image: url(https://source.unsplash.com/random);background-size: 100% ;position:fixed; background-position: center;
  background-repeat: no-repeat;">
</div>
<div class="container" style="z-index: 99">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
            </div>
            <form class="user" method="post" action="{{route('do_register')}}">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                </div>
              </div>
              <button href="login.html" class="btn btn-primary btn-user btn-block">
              Daftar Akun
              </button>
              <hr>
            </form>
            <div class="text-center">
              <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>