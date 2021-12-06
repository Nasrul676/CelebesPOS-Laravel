@extends('theme')
@section('sidebarsatuan', 'mm-active')
@section('title','Data Satuan Produk')
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
                <span><i class="fas fa-plus"></i> Tambah Data Satuan Barang</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-2 mr-2 w-100 navbar-search"  method="GET" action="{{route('satuan')}}" style="padding: 10px;">
            <div class="input-group">
              <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Cari Satuan..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success btn-search shadow-sm" type="submit">
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
        <table class="mb-0 text-center table table-bordered">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>Id</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
            <tbody>
              @foreach ($data as $getsatuan)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$getsatuan->satuan}}</td>
                <td>
                  <form id="delete-satuan" action="{{ route('destroy_satuan', $getsatuan->id) }}">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                  <a href="{{ route('edit_satuan',['id' => $getsatuan->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-satuan')" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></button>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan Barang</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" class="needs-validation" novalidate action="{{route('tambah_data_satuan')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="container">
        <div class="">
          <label for="nama">Nama Satuan</label>
          <input class="form-control" type="text" autocomplete="off" name="satuan"  required>
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