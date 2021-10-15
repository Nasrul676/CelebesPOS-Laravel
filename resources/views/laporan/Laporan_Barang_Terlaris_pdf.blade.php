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
		<h2 style="font-size: 25px">Laporan Barang Terlaris</h2>
	</div>
		<h4 style="font-size: 15px">Tanggal : {{$tanggalAwal}} / {{$tanggalAkhir}}</h4>
	<div>
		<table>
		  <tr style="background-color: #04AA6D; color: white; font-size: 13px">
		  	<th>No.</th>
		    <th>Nama Barang</th>
		    <th>Total Harga</th>
		    <th>Total Stok Terjual</th>
		  </tr>
		  
		@foreach ($laris as $lar )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$lar->nama_barang}}</td>
                <td>@currency($lar->harga)</td>
                <td>{{$lar->qty}}</td>
	        </tr>
        @endforeach
		  
		</table>
	</div>
	<footer><p>CelebesPOS.com</p></footer>
</body>
</html>