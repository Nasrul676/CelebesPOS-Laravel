@extends('theme')
@section('sidebarproduk', 'mm-active')
@section('bg', 'bg-primary header-text-light')
@section('title','Data Produk')
@section('content')
@include('sweetalert::alert')
<div class="card">
  <div class="card-body">
    <div class="border mb-2">
      <div class="row">
        <div class="col-3">
          <ul class="tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a type="button" class="nav-link" href="{{ route('tambah_produk') }}">
                <span><i class="fas fa-plus"></i> Tambah Data Produk</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
          <form class="mt-3 form-inline mr-auto w-100 navbar-search"  method="GET" action="{{route('product')}}">
            <div class="input-group">
              <input type="text" class="form-control shadow-sm small" value="{{old('cari')}}" name="cari" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success btn-search" type="submit">
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
          <thead class="bg-info text-white text-center">
            <tr>
              <th>No.</th>
              <th>Nama Produk</th>
              <th>Barcode</th>
              <th>Foto</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th>Kategori</th>
              <th>Supplier</th>
              <th>Harga Modal</th>
              <th>Harga Jual</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $getproduk)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getproduk->nama_barang}}</td>
              <td>{{$getproduk->barcode}}</td>
              <td>
                @if($getproduk->foto == "")
                <img src="{{asset('images/default/default.png')}}" width="100px" height="50px">
                @else
                <a href="{{asset('/images/fotoProduk/' .$getproduk->foto)}}"><img id="myImg" src="{{asset('/images/fotoProduk/' .$getproduk->foto)}}" width="100px;" height="50px" alt="image">
                </a>
                @endif
              </td>
              <td>{{$getproduk->stok_barang}}</td>
              <td>{{$getproduk->satuan_barang}}</td>
              <td>{{$getproduk->kategori}}</td>
              <td>{{$getproduk->suppliner}}</td>
              <td>@currency($getproduk->harga_modal)</td>
              <td>@currency($getproduk->harga_jual)</td>
              <td>
                <form id="delete-produk" action="{{ route('hapus_produk', $getproduk->id) }}">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                <a href="{{ route('edit_produk',['id' => $getproduk->id]) }}" class="badge badge-warning"><i class="fas fa-edit"></i> edit</a>
                <button type="button" class="badge badge-danger" onclick="confirmDelete('delete-produk')"><i class="fas fa-trash"></i> hapus</button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div><br>
    <div class="border" style="padding: 10px;">
      <div class="text-center" style="margin-bottom: -15px;">
        {{ $data->links() }}
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<script>
  function previewImages(){
    const [file] = image.files
    if(file){
      imgPreview.src = URL.createObjectURL(file)
    }
  }
</script>
@endsection