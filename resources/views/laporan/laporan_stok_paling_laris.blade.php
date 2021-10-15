@extends('theme')
@section('laporan_laris', 'mm-active')
@section('title','Laporan Produk Terlaris')
@section('content')
@include('sweetalert::alert')
<div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="card-title">
                <div class="card-header">
                    Data Barang Yang Paling Laris
                </div>
                <div class="mt-3">
                    <form method="GET" action="{{route('laporan_produk_terlaris')}}">
                        Cetak laporan dari tanggal <input type="date" placeholder="Masukkan Tanggal" name="tanggal_awal"> sampai tanggal <input type="date" placeholder="Masukkan Tanggal" name="tanggal_akhir">
                        <button class="btn btn-primary btn-report">
                            <label class="fas fa-print mr-2"></label>Cetak Laporan
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table table-bordered">
                    <thead class="bg-info text-center text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Total Harga</th>
                            <th>Jumlah Stok Yang Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($laris as $lar )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lar->nama_barang}}</td>
                            <td>@currency($lar->harga)</td>
                            <td>{{$lar->qty}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection