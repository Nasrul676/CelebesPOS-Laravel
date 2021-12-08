@extends('master_layout.link')
@section('judul', 'Login')
@section('content')
@include('sweetalert::alert')
<div class="app-container app-theme-white body-tabs-shadow">
  <div class="app-container">
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-8">
          <div class="app-logo-inverse mx-auto mb-3">
            <span style="font-size: 15px; color: #ffffff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Celebes POS</span>
          </div>
          <div class="modal-dialog w-100 mx-auto">
            <div class="modal-content">
              <div class="modal-body">
                <div class="h5 modal-title text-center">
                  <h4 class="mt-2">
                  <div>Selamat Datang</div>
                  <span>Silahkan Login Untuk Masuk Ke Dashboard.</span>
                  </h4>
                </div>
                <form class="needs-validation" novalidate method="POST" action="{{ route('login') }}" class="">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-row">
                    <div class="col-md-12">
                      <div class="position-relative form-group">
                        <input id="validationTooltip01" type="email" class="form-control" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                        <div class="invalid-tooltip">
                         Mohon Masukkan Email Yang Valid
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="position-relative form-group">
                        <input id="password  validationTooltip02" placeholder="Masukkan Password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        <div class="invalid-tooltip">
                          Password Tidak Boleh Kosong
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="text-info"><a data-toggle="modal" data-target="#exampleModal"><span>CONTACTS PERSON</span></a></div>
                </div>
                <div class="modal-footer clearfix">
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center text-white opacity-8 mt-3">Copyright © Muh Nasrul 2020 | Junior Web Dev</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Person</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          Muh Nasrul
          <br>
          nasrulmuhammad676@gmail.com
          <br>
          082264493618
          <br>
          <a href="https://muhammadnasrul.netlify.com/">https://muhammadnasrul.netlify.com/</a>
          <br>
          <hr>
          admin : admin@gmail.com
          <br>
          password : admin
          <br>
          <hr>
          kasir : kasir@gmail.com
          <br>
          password : admin
          <br>
          <hr>
          <div class="text-warning"><span>Mohon Copyright jangan dihapus</span></div>
          <br>
          <hr>
          <div class="text-center text-danger"><span>Copyright &copy; GoPOS nasrul 2020 | Junior Web Dev</span></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
@endsection
