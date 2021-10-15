<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<style type="text/css">
		body{
			width: 100%;
			height: 100%;
		}

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
		<h2 style="font-size: 25px">Laporan Stok Habis</h2>
	</div>
	<div>
		<table>
		  <tr style="background-color: #04AA6D; color: white; font-size: 13px">
		  	<th>No.</th>
		    <th>Nama Barang</th>
		    <th>Jumlah Stok Tersisa</th>
		    <th>Satuan Barang</th>
		  </tr>
		  
		@foreach ($lapor as $lap )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$lap->nama_barang}}</td>
                <td>{{$lap->stok_barang}}</td>
                <td>{{$lap->satuan_barang}}</td>
	        </tr>
        @endforeach
		  
		</table>
	</div>
	<footer><p>CelebesPOS.com</p></footer>
</body>
</html>