@extends('theme')
@section('sidebarstokout', 'mm-active')
@section('title','Tambah Stok Keluar')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="{{ route('tambah_stok_out') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Barcode</label>
                    <div class="form-group input-group">
                        <input  id="barcode" name="barcode" readonly="true" type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stok_out_modal">
                            <i class="fas fa-search"></i> Cari Barcode
                            </button>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        Barcode Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Nama Produk</label>
                    <input class="form-control" readonly="true" type="text" name="nama_produk" id="nama_barang" required="true">
                    <div class="invalid-feedback">
                        Nama Produk Tidak Boleh Kosong.
                    </div>
                </div>
                <input class="form-control" type="hidden" name="id" readonly="true" id="id">
                <div class="col-md-4 mb-3">
                    <label for="nama">Stok Saat Ini</label>
                    <input readonly="true" class="form-control" id="stok_barang" type="text" name="stok_barang"  required>
                    <div class="invalid-feedback">
                        Stok Saat Ini Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nama">QTY Stok Out</label>
                    <input class="form-control" id="jumlah_barang" type="text" name="jumlah_barang"  required>
                    <div class="invalid-feedback">
                        QTY Stok Out Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama">Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" id="keterangan" value="">
                    <div class="valid-feedback">
                        Silahkan Masukkan Keterangan Jika Tersedia.
                    </div>
                </div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Data Yang Dimasukkan Telah Benar.
                </label>
                <div class="invalid-feedback">
                    Anda Harus Memasukkan Data Dengan Lengkap..!
                </div>
            </div>
            <a class="btn btn-outline-danger" href="{{route('stok_out')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-paper-plane"></i> Save</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="stok_out_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Pilih Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<table class="table table-bordered" style="width: auto;">
    <thead>
        <tr>
            <td>Barcode</td>
            <td>Nama</td>
            <td>Stok</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_produk as $getproduk)
        <tr>
            <td>{{$getproduk->barcode}}</td>
            <td>{{$getproduk->nama_barang}}</td>
            <td>{{$getproduk->stok_barang}}</td>
            <td>
                <button class="btn btn-primary" id="select"
                data-barcode="{{$getproduk->barcode}}"
                data-nama_barang="{{$getproduk->nama_barang}}"
                data-stok_barang="{{$getproduk->stok_barang}}"
                data-id="{{$getproduk->id}}"
                ><i class="fas fa-check-double"></i> Select</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-danger shadow-sm" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Close</button>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#select', function() {
        var barcode = $(this).data('barcode');
        var nama_barang = $(this).data('nama_barang');
        var stok_barang = $(this).data('stok_barang');
        var id = $(this).data('id');
        $('#barcode').val(barcode);
        $('#nama_barang').val(nama_barang);
        $('#stok_barang').val(stok_barang);
        $('#id').val(id);
        $('#stok_out_modal').modal('hide');
    })
})
</script>
@endsection