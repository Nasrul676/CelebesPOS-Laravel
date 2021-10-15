<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style type="text/css">
		body{
			font-family: sans-serif;;
		}
		.style-logo{
			font-family: sans-serif;
			color: #E02401;
			position: absolute;
			top: 0px;
			left: 0px; 
		}
		.date{
			font-family: sans-serif;
			position: absolute;
			top: 0px;
			right: 0px;
			margin-right: 10px;
		}
		.head h5{
			margin-top: 100px;
		}
		.table{
			border-collapse: collapse;
			width: 100%;
		}
		th, td{
			padding: 10px;
			text-align: left;
			border-bottom: 2px solid #ddd;
		}
	</style>
</head>
<body>
	<div style="position: relative;">
		<div>
			<h1 class="style-logo">Celebes POS</h1>
			@foreach ($data as $dda)
			<h5 class="date">Tanggal: {{$dda->tanggal}}</h5>
			<h6 class="date"></h6>
			@endforeach
		</div>
	</div>
	<div class="head">
		<h5>Kasir : {{ Auth::user()->name }}</h5>		
	</div>

	<div class="table">
		<table class="">
			<tr>
				<th>Nama Barang</th>
				<th>Qty</th>
				<th>Diskon</th>
				<th>Harga</th>
			</tr>
			@php $i=1 @endphp
			@foreach($data as $dta)
			<tr>
				<td>{{$dta->nama_barang}}</td>
				<td>{{$dta->qty}}</td>
				<td>{{$dta->diskon}}%</td>
				<td>@currency($dta->harga)</td>
			</tr>
			@endforeach
		</table>
	</div>
		<h4>Total QTY : {{$qty}}</h4>
		<h4>Total Harga : @currency($total)</h4>
		<h4>Total Diskon : {{$diskon}}%</h4>
</body>
</html>