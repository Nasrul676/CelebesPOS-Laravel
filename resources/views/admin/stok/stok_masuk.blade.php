@extends('theme')
@section('sidebarstokin', 'mm-active')
@section('title','Stok Masuk')
@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
  <div class="card-body">
    <div class="border mb-3">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a href="{{route('tambah_stok')}}" class="nav-link">
                <span><i class="fas fa-plus"></i> Tambah Data Stok Masuk</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3">
          
        </div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="d-none mt-3 d-sm-inline-block form-inline pull-right navbar-search" method="GET" action="{{route('stok_in')}}">
            <div class="input-group">
              <input type="text" name="cari" class=" form-control shadow-sm large" value="{{old('cari')}}" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success shadow-sm  btn-search" type="submit">
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
        <table class="mb-0 text-center table table-bordered">
          <thead class="bg-info text-white">
            <tr>
              <th>Id</th>
              <th>Nama Produk</th>
              <th>Barcode</th>
              <th>Suppliner</th>
              <th>Jumlah Stok Masuk</th>
              <th>Satuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getstok)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getstok->nama_barang}}</td>
              <td>{{$getstok->barcode}}</td>
              <td>{{$getstok->suppliner}}</td>
              <td>{{$getstok->jumlah_produk}}</td>
              <td>{{$getstok->satuan_barang}}</td>
              <td>
                  <form id="delete-stok" action="{{ route('hapus_stok_in', $getstok->id) }}">
                  {{csrf_field()}}
                  {{method_field('delete')}}
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-stok')"><i class="fas fa-trash"></i> hapus</button>
              </form>
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
@endsection