<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<style type="text/css">
		table, td, th {  
		  border: 1px solid #ddd;
		  text-align: left;
		}

		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  padding: 15px;
		}
		
		footer p{
			font-size: 10px;
			color: blue;
		}
	</style>
</head>
<body>
	<div>
		<h2 style="font-size: 25px">Laporan Riwayat Transaksi</h2>
	</div>
		<h4 style="font-size: 15px">Tanggal : {{$tanggalAwal}} / {{$tanggalAkhir}}</h4>
	<div>
		<table>
		  <tr style="background-color: #04AA6D; color: white; font-size: 13px">
		  	<th>No.</th>
		    <th>Nama Barang</th>
		    <th>Nama Kasir</th>
		    <th>Qty</th>
		    <th>Total Harga</th>
		    <th>Jumlah Diskon</th>
		    <th>Nama Customer</th>
		    <th>Tanggal</th>
		  </tr>
		  @foreach ($lapor as $lap)
		  <tr style="font-size: 11px">
		  	<td>{{$loop->iteration}}</td>
		    <td>{{$lap->nama_barang}}</td>
		    <td>{{$lap->nama_kasir}}</td>
		    <td>{{$lap->qty}}</td>
		    <td>@currency($lap->harga)</td>
		    <td>{{$lap->diskon}} %</td>
		    <td>{{$lap->nama_customer}}</td>
		    <td>{{$lap->tanggal}}</td>
		  </tr>
		  @endforeach
		</table>
	</div>
	<footer><p>CelebesPOS.com</p></footer>
</body>
</html>