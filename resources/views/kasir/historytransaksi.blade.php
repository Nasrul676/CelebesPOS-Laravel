@extends('theme')
@section('history', 'mm-active')
@section('title','Riwayat Transaksi')
@section('content')
@include('sweetalert::alert')
<div class="main-card card">
  <div class="card-body">
    <div class="border mb-3">
      <div class="row">
        <div class="col-3">
          <div class="mt-4 ml-4 mb-4 form-group">
            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><label class="fas fa-print mr-2"></label>Cetak Laporan</button>
          </div>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mb-4 mt-4 mr-4 d-none d-sm-inline-block form-inline pull-right navbar-search" method="GET" action="{{route('history')}}">
            <div class="input-group">
              <input type="text" name="cari" class=" form-control shadow-sm large" value="{{old('cari')}}" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success shadow-sm btn-search" type="submit">
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
          <thead class="bg-info text-white">
            <tr>
              <th>No.</th>
              <th>Nama Produk</th>
              <th>Jumlah Produk</th>
              <th>Total Harga</th>
              <th>Jumlah Diskon</th>
              <th>Nama Kasir</th>
              <th>Nama Customer</th>
              <th>Tanggal Transaksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getdata)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getdata->nama_barang}}</td>
              <td>{{$getdata->qty}}</td>
              <td>@currency($getdata->harga)</td>
              <td>{{$getdata->diskon}} %</td>
              <td>{{$getdata->nama_kasir}}</td>
              <td>{{$getdata->nama_customer}}</td>
              <td>{{$getdata->tanggal}}</td>
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
<form method="GET" action="{{route('laporan_transaksi')}}">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          dari tanggal <input type="date" placeholder="Masukkan Tanggal" name="tanggal_awal"> sampai tanggal <input type="date" placeholder="Masukkan Tanggal" name="tanggal_akhir">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
          <button type="submit" class="btn btn-primary  btn-report">print</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection