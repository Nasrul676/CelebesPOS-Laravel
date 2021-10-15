@extends('theme')
@section('title','Edit Produk')
@section('content')
@if(session('alert'))
<div class="container">
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Sukses</h4>
        <p class="mb-0">{{ session('alert') }}</p>
    </div>
</div>
@endif
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  enctype="multipart/form-data" method="post" action="{{ route('update_produk', ['id' => $data->id ]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-3">
                <div class="col">
                    <label for="validationCustom03">Nama Produk</label>
                    <input class="form-control" type="text" name="nama_barang"value="{{ $data->nama_barang }}" required>
                    <div class="invalid-feedback">
                        Nama Produk Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="validationCustom03">Barcode</label>
                    <input class="form-control" autocomplete="off" type="text" name="barcode"value="{{ $data->barcode }}" required>
                    <div class="invalid-feedback">
                        Barcode Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <label>Upload Foto</label>
            <div class="row ml-0 mr-0 border">
                <div class="col">
                    <input type="file" class="mt-3" id="image" name="foto" value="{{$data->foto}}">
                    <div class="mb-3 mt-3">
                        @if($data->foto == "")
                        <img class="" src="{{asset('images/default/default.png')}}" width="200px" height="100px">
                        @else
                        <img src="{{asset('/images/' .$data->foto)}}" width="200px" height="100px" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label for="validationCustom03">Supplier</label>
                    <select class="custom-select" id="inputGroupSelect01" name="suppliner" value="{{ $data->suppliner }}">
                        <option>{{$data->suppliner}}</option>}
                        option
                        @foreach ($data_suppliner as $getsuppliner)
                        <option>{{$getsuppliner->nama_suppliner}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Supplier Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="validationCustom03">Stok Barang</label>
                    <input class="form-control" type="number" name="stok_barang"value="{{ $data->stok_barang }}" required>
                    <div class="invalid-feedback">
                        Stok Barang Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Satuan Barang </label>
                    <select class="custom-select" id="inputGroupSelect01" name="satuan_barang" value="{{ $data->satuan_barang }}">
                        <option>{{$data->satuan_barang}}</option>}
                        option
                        @foreach ($data_satuan as $getsatuan)
                        <option>{{$getsatuan->satuan}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Satuan Barang Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Kategori</label>
                    <select class="custom-select" id="inputGroupSelect01" name="kategori" value="{{ $data->nama_barang }}">
                        <option>{{$data->kategori}}</option>}
                        option
                        @foreach ($data_kategori as $getkategori)
                        <option>{{$getkategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Satuan Barang Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Harga Pokok</label>
                    <input class="form-control" autocomplete="off" id="rupiah" type="text" name="harga_modal" value="{{$data->harga_modal}}"  required>
                    <div class="invalid-feedback">
                        Harga Pokok Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Harga Jual </label>
                    <input class="form-control" autocomplete="off" id="rupiah2" name="harga_jual" value="{{$data->harga_jual}}"  required>
                    <div class="invalid-feedback">
                        Harga Pokok Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Data Yang Dimasukkan Telah Benar.
                    </label>
                    <div class="invalid-feedback">
                        Anda Harus Memasukkan Data Dengan Lengkap..!
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-danger shadow-sm mb-3" href="{{route('product')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button class="btn btn-success shadow-sm mb-3" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection