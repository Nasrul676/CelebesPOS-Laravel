@extends('theme')
@section('sidebarstokout', 'mm-active')
@section('title','Stok Keluar')
@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
  <div class="card-body">
    <div class="border mb-3">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a href="{{route('tambah_stok_out')}}" class="nav-link">
                <span><i class="fas fa-plus"></i> Tambah Data Stok Keluar</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="d-none mt-3 d-sm-inline-block form-inline pull-right navbar-search" method="GET" action="{{route('stok_out')}}">
            <div class="input-group">
              <input type="text" name="cari" class=" form-control shadow-sm large" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
    <div class="border" style="padding: 10px">
      <div class="table-responsive">
        <table class="mb-0 table text-center table-bordered">
          <thead class="bg-info text-white">
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Barcode</th>
              <th>Jumlah Stok Out</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getstokout)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getstokout->nama_barang}}</td>
              <td>{{$getstokout->barcode}}</td>
              <td>{{$getstokout->jumlah_stok_out}}</td>
              <td>{{$getstokout->keterangan}}</td>
              <td>
                <form id="delete-stokout" action="{{ route('hapus_stok_out', $getstokout->id) }}">
                  {{csrf_field()}}
                  {{method_field('delete')}}
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-stokout')"><i class="fas fa-trash"></i> hapus</button>
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