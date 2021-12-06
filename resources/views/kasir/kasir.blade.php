@extends('theme')
@section('sales', 'mm-active')
@section('title','Kasir')
@section('content')
@include('sweetalert::alert')
<div class="">
	<div class="">
		<div class="row">
			<div class="col-lg-6">
				<div class="main-card card">
					<div class="card-body">
						<form   method="GET" action="{{route('sales')}}">
							<div class="form-group input-group">
								<input  id="barcode" name="cari" autofocus placeholder="Masukkan Nama Barang/Barcode" type="text" class="form-control">
								<div class="input-group-append">
									<button type="submit" class="btn btn-primary btn-cari">
									<i class="fas fa-search"></i> Cari Barcode
									</button>
								</div>
								<div class="mt-1 table-responsive">
									<table class="mb-0 table text-center table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Barang</th>
												<th>Jumlah Stok</th>
												<th>Harga</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $databarang)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$databarang->nama_barang}}</td>
												<input type="hidden" value="{{$databarang->id}}" name="">
												<td>{{$databarang->stok_barang}}</td>
												<td>@currency($databarang->harga_jual)</td>
												<td>
													<button type="button" class="btn btn-primary" id="select"
													data-stok_barang="{{$databarang->stok_barang}}"
													data-nama_barang="{{$databarang->nama_barang}}"
													data-id="{{$databarang->id}}"
													data-harga_jual="{{$databarang->harga_jual}}"
													><i class="fas fa-check-double"></i> Select</button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="col-lg-6">
				<div class="main-card card">
					<div class="mt-3 mb-2 card-body">
						<form class="" action="{{route('submit')}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Nama Barang</label>
										<input readonly="true" id="nama_barang" name="nama_barang" placeholder="" type="text" class="form-control">
									</div>
								</div>
								<input type="hidden" id="stok_barang" name="stok_barang">
								<input type="hidden" value="{{ Auth::user()->name }}" name="nama_kasir">
								<input type="hidden" id="id" name="id">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Harga</label>
										<input readonly="true" id="harga_jual" name="harga_jual" placeholder="" type="text"
										class="form-control">
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Diskon %</label>
										<input name="diskon" value="0" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Qty</label>
										<input name="qty" placeholder="" value="1" type="number"
										class="form-control">
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Tanggal</label>
										<input name="tanggal" type="date" value="{{ date('Y-m-d') }}" autocomplete="off" class="form-control"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label>Nama Customer</label>
										<select name="nama_customer" class="form-control multiselect-dropdown">
											<optgroup label="Pilih Nama Customer">
												<option></option>
												@foreach ($namacustomer as $customer)
													<option>{{$customer->nama_customer}}</option>
												@endforeach
											</optgroup>
										</select>
									</div>
								</div>
							</div>	
							<button type="submit" class="float-right  btn btn-primary btn-submit"><i class="fas fa-calculator"></i> Check Out</button>								
								</div>		
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-8">
				<div class="main-card card">
					<div class="card-body">
						<h5 class="card-title">Detail Pesanan</h5>
						<form action="{{route('invoice')}}" method="GET">
							<input type="hidden" name="nama_barang_confirm" value="{{$total}}">
							<button type="submit" class="btn btn-success btn-invoice" style="position: absolute; top: 0px; right: 0px; margin-top: 10px; margin-right: 10px"><i class="fas fa-print"></i>  cetak invoice</button>
						</form>
						<div class="table-responsive">
							<table class="mb-0 table text-center table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Qty</th>
										<th>Diskon</th>
										<th>Sub Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($transaction as $datatransaction)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$datatransaction->nama_barang}}</td>
										<td>{{$datatransaction->qty}}</td>
										<td>{{$datatransaction->diskon}} %</td>
										<td>@currency($datatransaction->harga)</td>
										<td>
											<form id="delete-transaction" action="{{ route('hapus_transaksi', $datatransaction->id) }}">
                  							{{csrf_field()}}
                  							{{method_field('delete')}}
											<button type="button" class="btn btn-outline-danger" onclick="confirmDelete('delete-transaction')"><i class="fas fa-trash"></i> hapus</button>
										</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col-lg-4">
				<div class="main-card card">
					<div class="card-body"><h5 class="card-title">Pembayaran</h5>
						<form id="bayar" action="{{route('bayar')}}" >
							{{csrf_field()}}
							{{method_field('get')}}
							<div class="position-relative form-group">
								<label for="exampleEmail" class="">Total Harga</label>
								<input name="total_harga" value="{{$total}}" readonly="true" id="exampleEmail" type="text" class="form-control">
							</div>
							<div class="position-relative form-group">
								<label for="examplePassword" class="">Bayar (Rp)</label>
								<input name="bayar" id="examplePassword" placeholder="Bayar" value="0" type="number"
								class="form-control">
							</div>
							<button type="button" class="btn btn-warning" onclick="confirmPay('bayar')"><i class="fas fa-paper-plane"></i> Bayar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
  function confirmDelete(item_id) {
    swal({
      title: 'Hapus data Transaksi...?',
      text: "Klik Hapus untuk menghapus data !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.value) {
        $('#'+item_id).submit();
      } else {
        swal('Hapus', 'Hapus Data Di Batalkan', 'info');
      }
    });
  }
</script>
<script>
  function confirmPay(item_id) {
    var bayar = $("input[name='bayar']").val();
    var total = "{{ $total }}";
    swal({
        title: 'Lanjutkan Pembayaran...?',
        text: "Klik Bayar untuk melakukan pembayaran !",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Bayar'
    }).then((result) => {
        if (result.value) {
                $('#' + item_id).submit();
        } else {
            swal('Pembayaran', 'Pembayaran Di Batalkan', 'info');
        }
    });
}
</script>
@endsection