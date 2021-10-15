@extends('theme')
@section('sidebarsupplier', 'mm-active')
@section('title','Edit Suppliner')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="{{ route('simpan_suppliner', ['id' => $data->id ]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Nama Suppliner</label>
                    <input class="form-control" type="text" autocomplete="off" name="nama_suppliner"value="{{ $data->nama_suppliner }}" required>
                    <div class="invalid-feedback">
                        Nama Supplier Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">Alamat</label>
                    <input class="form-control" type="text" autocomplete="off" name="alamat"value="{{ $data->alamat }}" required>
                    <div class="invalid-feedback">
                        Alamat Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">No HP</label>
                    <input class="form-control" type="number" autocomplete="off" name="no_hp"value="{{ $data->no_hp }}" required>
                    <div class="invalid-feedback">
                        No HP Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">Deskripsi</label>
                    <input class="form-control" type="text" autocomplete="off" name="deskripsi"value="{{ $data->deskripsi }}">
                    <div class="invalid-feedback">
                        Deskripsi Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                         Cek List Jika Data Yang Dimasukkan Telah Benar...!
                    </label>
                    <div class="invalid-feedback">
                        Anda Harus Memasukkan Data Dengan Lengkap...!
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-danger shadow-sm mb-3" href="{{route('suppliner')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button class="btn btn-success shadow-sm mb-3" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection