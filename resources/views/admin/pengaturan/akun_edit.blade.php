@extends('theme')
@section('title','Edit Akun')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" enctype="multipart/form-data"  novalidate  method="post" action="{{ route('simpan_foto', ['id' => $data->id ]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row mb-3">
                <div class="col">
                    
                    <label for="nama">Nama </label>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
                    <div class="invalid-feedback">
                        Nama Akun Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col">
                    <label for="email">Email</label>
                    @if (Auth::user()->name == $akun->name)
                    <input readonly class="form-control" autocomplete="off" type="text" name="email" value="{{        $data->email }}" required>
                    @else
                    <input class="form-control" type="text" name="email" value="{{ $data->email }}" required>
                    @endif
                    <div class="valid-feedback">
                        Mohon Untuk Mengganti Email Jika Tersedia.
                    </div>
                </div>
                <div class="col">
                    <label class="" for="nama">password </label>
                    <input class="form-control" type="password" name="password">
                    <div class="valid-feedback">
                        Mohon Untuk Mengganti Password Jika Tersedia.
                    </div>
                </div>
                <div class="col">
                    <label class="mt-2">Upload Foto</label>
                    <div class="mb-3">
                        <input type="file" class="" id="image" name="foto" >
                    </div>
                    <div class="valid-feedback">
                        Mohon Untuk Mengganti Foto Jika Tersedia.
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
            <a class="btn btn-outline-danger shadow-sm mb-3" href="{{route('akun')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button class="btn btn-success shadow-sm mb-3" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection