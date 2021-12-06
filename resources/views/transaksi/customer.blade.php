@extends('theme')
@section('sidebarcustomer', 'mm-active')
@section('title','Data Customer')
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
                <span><i class="fas fa-plus"></i> Tambah Data Customer</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('customer')}}">
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
          <thead class="bg-info text-white">
            <tr>
              <th>Id</th>
              <th>Nama Customer</th>
              <th>Alamat</th>
              <th>No. HP</th>
              <th>No. KTP</th>
              <th>Deskripsi</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_customer as $getcustomer)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getcustomer->nama_customer}}</td>
              <td>{{$getcustomer->alamat}}</td>
              <td>{{$getcustomer->no_hp}}</td>
              <td>{{$getcustomer->no_ktp}}</td>
              <td>{{$getcustomer->deskripsi}}</td>
              <td>{{$getcustomer->jenis_kelamin}}</td>
              <td>
                <form id="delete-customer" action="{{ route('hapus_customer', $getcustomer->id) }}">
                  {{csrf_field()}}
                  {{method_field('delete')}}
                  <a href="{{ route('edit_customer',['id' => $getcustomer->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-customer')"><i class="fas fa-trash"></i></button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table><br>
        {{ $data_customer->links() }}
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
  <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form class="needs-validation" novalidate   method="post" action="{{ route('save_customer') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="container">
      <div class="mt-2">
        <label for="nama">Nama Customer</label>
        <input class="form-control" type="text" name="nama_customer"  required>
        <div class="invalid-feedback">
          Nama Customer Tidak Boleh Kosong.
        </div>
      </div>
      <div class="mt-2">
        <label for="nama">Alamat</label>
        <input class="form-control" type="text" name="alamat"  required>
        <div class="invalid-feedback">
          Alamat Tidak Boleh Kosong.
        </div>
      </div>
      <div class="mt-2">
        <label for="nama">No HP</label>
        <input class="form-control" type="number" name="no_hp"  required>
        <div class="invalid-feedback">
          No HP Tidak Boleh Kosong.
        </div>
      </div>
      <div class="mt-2">
        <label for="nama">No KTP</label>
        <input class="form-control" type="number" name="no_ktp"  required>
        <div class="invalid-feedback">
          No KTP Tidak Boleh Kosong.
        </div>
      </div>
      <div class="mt-2">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required="true" class="custom-select" id="inputGroupSelect01">
          <option disabled="true" selected="true">--pilih jenis kelamin--</option>
          <option value="L">L</option>
          <option value="P">P</option>
        </select>
        <div class="invalid-feedback">
          Pilih Jenis Kelamin.
        </div>
      </div>
      <div class="mt-2">
        <label for="nama">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi">
        <div class="valid-feedback">
          Harap Masukkan Deskripsi Bila Ada.
        </div>
      </div>
      <div class="form-check mt-2">
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
@endsection