@extends('theme')
@section('sidebarstokin', 'mm-active')
@section('title','Tambah Stok Masuk')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="{{ route('tambah_stok_in') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Barcode</label>
                    <div class="form-group input-group">
                        <input  id="barcode" name="barcode" readonly="true" type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                <input class="form-control" type="hidden" name="id" id="id">
                <div class="col-md-4 mb-3">
                    <label for="nama">Stok</label>
                    <input readonly="true" class="form-control" type="text" name="stok_barang" id="stok_barang" value="" required>
                    <div class="invalid-feedback">
                        Nama Produk Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nama">Satuan Produk</label>
                    <input class="form-control" type="text" id="satuan_barang" name="satuan_barang" readonly="true"  required>
                    <div class="invalid-feedback">
                        Satuan Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Kategori</label>
                    <input readonly="true" class="form-control" type="text" name="kategori" id="kategori" required>
                    <div class="invalid-feedback">
                        Kategori Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Harga Pokok</label>
                    <input readonly="true" class="form-control" type="text" name="harga_modal" id="harga_modal" value="" required>
                    <div class="invalid-feedback">
                        Harga Pokok Tidak Boleh Kosong.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nama">Harga Jual</label>
                    <input readonly="true" class="form-control" type="text" name="harga_jual" id="harga_jual" value="" required>
                    <div class="invalid-feedback">
                        Harga Jual Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Suppliner </label>
                    <select class="custom-select" id="inputGroupSelect01" name="suppliner">
                        <option></option>
                        @foreach ($data_suppliner as $getsuppliner)
                        <option>{{$getsuppliner->nama_suppliner}}</option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        Silahkan Pilih Suppplier Barang Jika Tersedia.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Jumlah Stok Masuk</label>
                    <input class="form-control" id="jumlah_produk" type="text" name="jumlah_produk"  required>
                    <div class="invalid-feedback">
                        Jumlah stok Masuk Tidak Boleh Kosong.
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
            <a class="btn btn-outline-danger" href="{{route('stok_in')}}"><i class="fas fa-undo-alt"></i> Batal</a>
            <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-paper-plane"></i> Save</button>
        </form>
    </div>
</div>
</div>
</form>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <td>Jumlah Stok</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_product as $getproduk)
        <tr>
            <td>{{$getproduk->barcode}}</td>
            <td>{{$getproduk->nama_barang}}</td>
            <td>{{$getproduk->stok_barang}}</td>
            <td>
                <button class="btn btn-primary" id="select" data-barcode="{{$getproduk->barcode}}"
                data-nama_barang="{{$getproduk->nama_barang}}"
                data-stok_barang="{{$getproduk->stok_barang}}"
                data-satuan_barang="{{$getproduk->satuan_barang}}"
                data-suppliner="{{$getproduk->suppliner
                }}"
                data-kategori="{{$getproduk->kategori}}"
                data-id="{{$getproduk->id}}"
                data-harga_modal="{{$getproduk->harga_modal}}"
                data-harga_jual="{{$getproduk->harga_jual}}"
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
        var id = $(this).data('id');
        var stok_barang = $(this).data('stok_barang');
        var satuan_barang = $(this).data('satuan_barang');
        var kategori = $(this).data('kategori');
        var suppliner = $(this).data('suppliner');
        var harga_modal = $(this).data('harga_modal');
        var harga_jual = $(this).data('harga_jual');
        $('#barcode').val(barcode);
        $('#nama_barang').val(nama_barang);
        $('#id').val(id);
        $('#stok_barang').val(stok_barang);
        $('#satuan_barang').val(satuan_barang);
        $('#kategori').val(kategori);
        $('#suppliner').val(suppliner);
        $('#harga_modal').val(harga_modal);
        $('#harga_jual').val(harga_jual);
        $('#exampleModal').modal('hide');
    })
})
</script>
@endsection