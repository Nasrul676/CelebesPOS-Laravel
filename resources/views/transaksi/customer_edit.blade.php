@extends('theme')
@section('sidebarcustomer', 'mm-active')
@section('title','Edit Customer')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="{{ route('simpan_customer', ['id' => $data->id ]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-3">
                <div class="col">
                    <label for="nama">Nama Customer</label>
                    <input class="form-control" type="text" name="nama_customer"value="{{ $data->nama_customer }}" required>
                    <div class="invalid-feedback">
                        Nama Customer Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">alamat</label>
                    <input class="form-control" type="text" name="alamat"value="{{ $data->alamat }}" required>
                    <div class="invalid-feedback">
                        Alamat Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">No HP</label>
                    <input class="form-control" type="number" name="no_hp"value="{{ $data->no_hp }}" required>
                    <div class="invalid-feedback">
                        No HP Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">No HP</label>
                    <input class="form-control" type="number" name="no_ktp"value="{{ $data->no_ktp }}" required>
                    <div class="invalid-feedback">
                        No KTP Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">Deskripsi</label>
                    <input class="form-control" type="text" name="deskripsi"value="{{ $data->deskripsi }}">
                    <div class="valid-feedback">
                        Deskripsi Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="nama">Jenis Kelamin</label>
                    <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                        @if($data->jenis_kelamin == "L")
                        <option value="L" selected>L</option>
                        <option value="P">P</option>
                        @else
                        <option value="L">L</option>
                        <option value="P" selected>P</option>
                        @endif
                    </select>
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
            <a class="btn btn-outline-danger shadow-sm mb-3" href="{{route('customer')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button class="btn btn-success shadow-sm mb-3" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection