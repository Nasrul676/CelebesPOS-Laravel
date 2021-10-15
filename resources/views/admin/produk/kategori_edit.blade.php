@extends('theme')
@section('title','Edit Kategori')
@section('sidebarkategori', 'mm-active')
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
        <form class="needs-validation" novalidate  method="post" action="{{ route('simpan_kategori', ['id' => $data->id ]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Nama Kategori</label>
                    <input class="form-control" type="text" autocomplete="off" name="nama_kategori"value="{{ $data->nama_kategori }}" required>
                    <div class="invalid-feedback">
                        Nama Kategori Tidak Boleh Kosong.
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
            <a class="btn btn-outline-danger shadow-sm mb-3" href="{{route('kategori')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button class="btn btn-success shadow-sm mb-3" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection