@extends('theme')
@section('sidebarstokin', 'mm-active')
@section('title','Tambah Stok Masuk')
@section('content')
@include('sweetalert::alert')
@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
@endif
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Tambah Data Produk</h5>
        <form class="needs-validation" novalidate  method="post" action="{{ route('tambah_data_produk') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="{{ old('nama_barang') }}" name="nama_barang" id="validationCustom03" required autofocus>
                    <div class="invalid-feedback">
                        Nama Produk Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Barcode</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="{{ old('barcode') }}" autocomplete="off" name="barcode"  required>
                    <div class="invalid-feedback">
                        Barcode Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-10">
                    <input type="file" class="" id="image" name="foto" onchange="previewImages()"><br>
                    <img id="imgPreview" src="#" alt=" Pastikan File Foto Kurang Dari 2 MB" width="200" height="200" class="img-thumbnail mt-3">
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Suppliner</label>
                <div class="col-sm-10">
                    <select class="form-control multiselect-dropdown" id="inputGroupSelect02" name="suppliner">
                        <option disabled="true" selected="true"></option>
                        @foreach ($data_suppliner as $getsuppliner)
                        <option>{{$getsuppliner->nama_suppliner}}</option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        Mohon Pilih Supplier Barang Jika Tersedia.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Kategori Barang</label>
                <div class="col-sm-10">
                    <select class="form-control multiselect-dropdown" id="inputGroupSelect01" required="true" name="kategori">
                        <option disabled="true" selected="true"></option>
                        @foreach ($data_kategori as $getkategori)
                        <option>{{$getkategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Mohon Pilih Kategori Barang.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Satuan Barang</label>
                <div class="col-sm-10">
                    <select class="form-control multiselect-dropdown" id="inputGroupSelect03" required="true" name="satuan">
                        <option disabled="true" selected="true"></option>
                        @foreach ($data_satuan as $getsatuan)
                        <option>{{$getsatuan->satuan}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Mohon Pilih Satuan Barang.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Jumlah Stok</label>
                <div class="col-sm-10">
                    <input type="number" autocomplete="off" value="{{ old('stok_barang') }}" class="form-control" name="stok_barang" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Jumlah Stok Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Harga Pokok</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" value="{{ old('harga_modal') }}" autocomplete="off" id="rupiah" type="text" name="harga_modal"  required>
                    <div class="invalid-feedback">
                        Harga Pokok Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" autocomplete="off" value="{{ old('harga_jual') }}" id="rupiah2" name="harga_jual"  required>
                    <div class="invalid-feedback">
                        Harga Jual Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="checkbox2" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="position-relative form-check">
                        <label class="form-check-label">
                            <input id="checkbox" value="" type="checkbox" id="invalidCheck"  for="invalidCheck" class="form-check-input" required>Check List Jika Data Yang Dimasukkan Telah Lengkap.
                            <div class="invalid-feedback">
                                Anda Harus Memasukkan Data Dengan Lengkap..!
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-end">
                    <div class="">
                        <a href="{{ route('product') }}" class="btn btn-outline-danger shadow-sm">
                            <i class="fas fa-undo-alt"></i> Kembali
                        </a>
                        <button class="btn btn-success">
                            <i class="fas fa-paper-plane"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  function previewImages(){
    const [file] = image.files
    if(file){
      imgPreview.src = URL.createObjectURL(file)
    }
  }
</script>
@endsection