@extends('theme')
@section('sidebarsupplier', 'mm-active')
@section('title','Data Supplier')
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
                                <span><i class="fas fa-plus"></i> Tambah Data Supplier Barang</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3">
                    <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('satuan')}}">
                        <div class="input-group">
                            <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                <table class="mb-0 table text-center table-bordered">
                    <thead class="bg-info text-center text-white">
                        <tr>
                            <th>Id</th>
                            <th>Nama Suppliner</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_suppliner as $getsuppliner)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$getsuppliner->nama_suppliner}}</td>
                            <td>{{$getsuppliner->alamat}}</td>
                            <td>{{$getsuppliner->no_hp}}</td>
                            <td>{{$getsuppliner->deskripsi}}</td>
                            <td>
                            <form id="delete-suppliner" action="{{ route('hapus_suppliner', $getsuppliner->id) }}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                <a href="{{ route('edit_suppliner',['id' => $getsuppliner->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> edit</a>
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-suppliner')"><i class="fas fa-trash"></i> hapus</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><br>
                {{ $data_suppliner->links() }}
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
    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier Barang</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="needs-validation" novalidate   method="post" action="{{ route('save_suppliner') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container">
            <div class="">
                <label for="nama">Nama Supplier</label>
                <input class="form-control" autocomplete="off" type="text" name="nama_suppliner"  required>
                <div class="invalid-feedback">
                    Nama Supplier Tidak Boleh Kosong.
                </div>
            </div>
            <div class="mt-2">
                <label for="nama">Alamat</label>
                <input class="form-control" autocomplete="off" type="text" name="alamat"  required>
                <div class="invalid-feedback">
                    Alamat Tidak Boleh Kosong.
                </div>
            </div>
            <div class="mt-2">
                <label for="nama">No HP/Telp/Fax</label>
                <input class="form-control" autocomplete="off" type="number" name="no_hp"  required>
                <div class="invalid-feedback">
                    No HP/Telp/Fax Tidak Boleh Kosong.
                </div>
            </div>
            <div class="mt-2">
                <label for="nama">Deskripsi</label>
                <input class="form-control" autocomplete="off" type="text" name="deskripsi">
                <div class="valid-feedback">
                    Mohon Masukkan Deskripsi Jika Tersedia.
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