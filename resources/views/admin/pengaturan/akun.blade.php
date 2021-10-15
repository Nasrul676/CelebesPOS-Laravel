@extends('theme')
@section('sidebarakun', 'mm-active')
@section('title','Akun')
@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
  <div class="card-body">
    <div class="border mb-3">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <span><i class="fas fa-plus"></i> Tambah Akun</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('akun')}}">
            <div class="input-group">
              <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success  btn-search" type="submit">
                <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="border" style="padding: 10px;">
      <div class="table-responsive">
        <table class="mb-0 table text-center table-bordered">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>Id</th>
              <th>Nama Akun</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Level</th>
              <th>Tanggal Registrasi</th>
              <th>Tanggal Update</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getakun)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getakun->name}}</td>
              <td>{{$getakun->email}}</td>
              <td>
                @if($getakun->foto == "")
                <img src="{{asset('images/default/default_avatar.png')}}" width="50px">
                @else
                <a href="{{asset('/images/akun/'.$getakun->foto)}}"><img  class="thumbnail" width="50" height="50"  src="{{asset('/images/akun/' .$getakun->foto)}}"></a>
              </a>
              @endif
            </td>
            <td>{{$getakun->is_admin}}
            </td>
            <td>{{$getakun->created_at}}</td>
            <td>{{$getakun->updated_at}}</td>
            <td>
              @if ($getakun->name == Auth::user()->name)
              <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Anda Tidak Bisa Menghapus Akun Yang Sedang Aktif"><i class="fas fa-eraser"></i> hapus</a>
              </button>
              @else
              <form id="delete-akun" action="{{ route('hapus_akun', $getakun->id) }}">
                  {{csrf_field()}}
                  {{method_field('delete')}}
                  <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-akun')"><i class="fas fa-trash"></i> hapus</button>
              </form>
              @endif
              <a href="{{ route('edit_akun',['id' => $getakun->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table><br>
      {{ $data->links() }}
    </div>
  </div>
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
<h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="needs-validation" novalidate  method="post" action="{{ route('save_akun') }}" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="container">
    <div class="">
      <label for="nama">Nama Akun</label>
      <input class="form-control" type="text" autocomplete="off" name="name"  required>
      <div class="invalid-feedback">
        Nama Akun Tidak Boleh Kosong.
      </div>
    </div>
    <div class="mt-2">
      <label for="nama">Alamat Email</label>
      <input class="form-control" type="email" autocomplete="off" name="email"  required>
      <div class="invalid-feedback">
        Email Tidak Boleh Kosong.
      </div>
    </div>
    <div class="mt-2">
      <label for="nama">Level</label>
      <select class="custom-select" id="inputGroupSelect01" required="true" name="is_admin">
        <option disabled="true" selected="true">---pilih level---</option>
        <option value="admin" name="admin">Admin</option>
        <option value="kasir" name="kasir">Kasir</option>
      </select>
      <div class="invalid-feedback">
        Level Harus Di Pilih.
      </div>
    </div>
    <div class="mt-2">
      <div class="form-group">
        <label for="nama">Password</label>
        <input class="form-control" type="password" autocomplete="off" name="password"  required>
        <div class="invalid-feedback">
          Password Tidak Boleh Kosong.
        </div>
      </div>
      <div class="form-check mb-3 mt-3">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Data Yang Dimasukkan Telah Benar.
        </label>
        <div class="invalid-feedback">
          Anda Harus Memasukkan Data Dengan Lengkap..!
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-outline-danger shadow-sm" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Close</button>
    <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-paper-plane"></i> Save</button>
  </form>
</div>
</div>
</div>
</div>
</div>
<script>
  function confirmDelete(item_id) {
    swal({
      title: 'Hapus data Akun...?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.value) {
        $('#'+item_id).submit();
      } else {
        swal('Success','Cancelled Successfully','success');
      }
    });
  }
</script>
@endsection