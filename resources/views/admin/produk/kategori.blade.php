@extends('theme')
@section('sidebarkategori', 'mm-active')
@section('title','Data Kategori Produk')
@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
  <div class="card-body">
    <div class="border mb-3">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a type="button" class="nav-link btn-sm" data-toggle="modal" data-target="#exampleModal">
                <span><i class="fas fa-plus"></i> Tambah Data Kategori Barang</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('kategori')}}">
            <div class="input-group">
              <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success  btn-search" type="submit">
                <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="border"  style="padding: 10px;">
      <div class="table-responsive">
        <table class="mb-0 table text-center table-bordered">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>Id</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getkategori)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getkategori->nama_kategori}}</td>
              <td>
                <form id="delete-kategori" action="{{ route('hapus_kategori', $getkategori->id) }}">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                <a href="{{ route('edit_kategori',['id' => $getkategori->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-kategori')" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <br>
    {{ $data->links() }}
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
<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Barang</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="needs-validation" novalidate   method="post" action="{{ route('save') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="container">
  <div class="">
    <label for="validationCustom03">Nama Kategori</label>
    <input class="form-control" type="text" autocomplete="off" name="nama_kategori"  required>
    <div class="invalid-feedback">
      Nama Kategori Tidak Boleh Kosong.
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
@endsection