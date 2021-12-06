@extends('theme')
@section('sidebarstokin', 'mm-active')
@section('title','Tambah Stok Masuk')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="{{ route('tambah_stok_in') }}">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Barcode</label>
                    <div class="form-group input-group">
                        <input  id="barcode" value="" name="barcode" type="text" class="form-control">
                        <div class="input-group-append">
                            {{-- <button type="submit"> --}}
                            {{-- <i class="fas fa-search"></i> Cari Barcode --}}
                            {{-- </button> --}}
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        Barcode Tidak Boleh Kosong.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Nama Produk</label>
                    <input class="form-control" type="text" name="nama_produk" value="" id="nama_barang" readonly required>
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
                    <select class="custom-select" value="" id="inputGroupSelect01" name="suppliner">
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
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script>
    $("#barcode").focusout(function(e){

        var barcode = $(this).val();
        var token = $("#token").val();
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token},
            url: "/admin/cari_Data",
            data: {'barcode':barcode},
            success : function(data) {
                if(data.length === 0){
                    swal('Data Tidak Ditemukan...!','pastikan barcode sudah terdaftar di produk','error');
                    $('#barcode').val('');
                    $('#nama_barang').val('');
                    $('#id').val('');
                    $('#stok_barang').val('');
                    $('#satuan_barang').val('');
                    $('#kategori').val('');
                    $('#suppliner').val('');
                    $('#harga_modal').val('');
                    $('#harga_jual').val('');
                } else {
                    $('#barcode').val(data[0].barcode);
                    $('#nama_barang').val(data[0].nama_barang);
                    $('#id').val(data[0].id);
                    $('#stok_barang').val(data[0].stok_barang);
                    $('#satuan_barang').val(data[0].satuan_barang);
                    $('#kategori').val(data[0].kategori);
                    $('#suppliner').val(data[0].suppliner);
                    $('#harga_modal').val(data[0].harga_modal);
                    $('#harga_jual').val(data[0].harga_jual);
                }
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
        });
    });
</script>
@endsection