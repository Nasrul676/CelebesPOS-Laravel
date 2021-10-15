@extends('theme')
@section('laporan', 'mm-active')
@section('title','Laporan')
@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="card-title">
            <div class="card-header">
                Data Stok Barang Yang Hampir Habis
            </div>
            <div class="mt-3">
                <input type="hidden" value="{{$cek}}" name="cek">
                <form method="GET" action="{{route('laporan_stok_habis')}}">
                    <button class="btn btn-primary btn-cek"><label class="fas fa-print mr-2"></label>Cetak Laporan</button>
                </form>    
            </div>
        </div>
        <div class="table-responsive">
            <table class="mb-0 table table-bordered">
                <thead class="bg-info text-center text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Progress</th>
                        <th>Jumlah Stok</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (is_array($data_stok ?? ''))
                    @foreach ($data_stok ?? '' as $getstok)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$getstok->nama_barang}}</td>
                        <td>
                            <div class="progress-bar-animated-alt progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:{{$getstok->stok_barang}}0%"></div>
                            </div>
                        </td>
                        <td>{{$getstok->stok_barang}}</td>
                        <td>{{$getstok->satuan_barang}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection