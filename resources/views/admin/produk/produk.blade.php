@extends('theme')
@section('sidebarproduk', 'mm-active')
@section('bg', 'bg-primary header-text-light')
@section('title','Data Produk')
@section('content')
@include('sweetalert::alert')
<div class="card">
  <div class="card-body">
    <div class="border mb-2">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <span><i class="fas fa-plus"></i> Tambah Data Produk</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('product')}}">
            <div class="input-group">
              <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success btn-search" type="submit">
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
          <thead class="bg-info text-white text-center">
            <tr>
              <th>No.</th>
              <th>Nama Produk</th>
              <th>Barcode</th>
              <th>Foto</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th>Kategori</th>
              <th>Supplier</th>
              <th>Harga Modal</th>
              <th>Harga Jual</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getproduk)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getproduk->nama_barang}}</td>
              <td>{{$getproduk->barcode}}</td>
              <td>
                @if($getproduk->foto == "")
                <img src="{{asset('images/default/default.png')}}" width="100px" height="50px">
                @else
                <a href="{{asset('/images/' .$getproduk->foto)}}"><img id="myImg" src="{{asset('/images/' .$getproduk->foto)}}" width="100px;" height="50px" alt="image">
                </a>
                @endif
              </td>
              <td>{{$getproduk->stok_barang}}</td>
              <td>{{$getproduk->satuan_barang}}</td>
              <td>{{$getproduk->kategori}}</td>
              <td>{{$getproduk->suppliner}}</td>
              <td>@currency($getproduk->harga_modal)</td>
              <td>@currency($getproduk->harga_jual)</td>
              <td>
                <form id="delete-produk" action="{{ route('hapus_produk', $getproduk->id) }}">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                <a href="{{ route('edit_produk',['id' => $getproduk->id]) }}" class="badge badge-warning"><i class="fas fa-edit"></i> edit</a>
                <button type="button" class="badge badge-danger" onclick="confirmDelete('delete-produk')"><i class="fas fa-trash"></i> hapus</button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div><br>
    <div class="border" style="padding: 10px;">
      <div class="text-center" style="margin-bottom: -15px;">
        {{ $data->links() }}
      </div>
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
<h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="">
<div class="">
  <div class="modal-body">
    <form class="needs-validation" novalidate  method="post" action="{{ route('tambah_data_produk') }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="container">
        <div class="">
          <label for="validationCustom03">Nama Produk</label>
          <input type="text" class="form-control" autocomplete="off" name="nama_barang" id="validationCustom03" required>
          <div class="invalid-feedback">
            Nama Produk Tidak Boleh Kosong.
          </div>
        </div>
        <div class="mt-3">
          <label for="nama">Barcode </label>
          <input class="form-control" type="text" autocomplete="off" name="barcode"  required>
          <div class="invalid-feedback">
            Barcode Tidak Boleh Kosong.
          </div>
        </div>
        <div class="mt-3 mb-3">
          <label for="validationCustom03">Foto</label>
          <input type="file" class="" id="image" name="foto" >
        </div>
        <div class="mt-3">
          <label for="validationCustom03">Supplier</label>
          <select class="custom-select" id="inputGroupSelect01" name="suppliner">
            <option disabled="true" selected="true">--pilih supplier--</option>
            @foreach ($data_suppliner as $getsuppliner)
            <option>{{$getsuppliner->nama_suppliner}}</option>
            @endforeach
          </select>
          <div class="valid-feedback">
            Mohon Pilih Supplier Barang Jika Tersedia.
          </div>
        </div>
        <div class="mt-3">
          <label for="validationCustom03">Jumlah Stok</label>
          <input type="number" autocomplete="off" class="form-control" name="stok_barang" id="validationCustom03" required>
          <div class="invalid-feedback">
            Jumlah Stok Tidak Boleh Kosong.
          </div>
        </div>
        <div class="mt-3">
          <label for="validationCustom03">Satuan Barang</label>
          <select class="custom-select" id="inputGroupSelect01" required="true" name="satuan">
            <option disabled="true" selected="true">--pilih satuan barang--</option>
            @foreach ($data_satuan as $getsatuan)
            <option>{{$getsatuan->satuan}}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">
            Mohon Pilih Satuan Barang.
          </div>
        </div>
        <div class="mt-3">
          <label for="validationCustom03">Kategori Barang</label>
          <select class="custom-select" id="inputGroupSelect01" required="true" name="kategori">
            <option disabled="true" selected="true">--pilih kategori barang--</option>
            @foreach ($data_kategori as $getkategori)
            <option>{{$getkategori->nama_kategori}}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">
            Mohon Pilih Kategori Barang.
          </div>
        </div>
        <div class="mt-3">
          <label for="nama">Harga Pokok</label>
          <input class="form-control" type="number" autocomplete="off" id="rupiah" type="text" name="harga_modal"  required>
          <div class="invalid-feedback">
            Harga Pokok Tidak Boleh Kosong.
          </div>
        </div>
        <div class="mt-3">
          <label for="validationCustom03">Harga Jual</label>
          <input class="form-control" type="number" autocomplete="off" id="rupiah2" name="harga_jual"  required>
          <div class="invalid-feedback">
            Harga Jual Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-check mt-3">
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
</div>
@endsection