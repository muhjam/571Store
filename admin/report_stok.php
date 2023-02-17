<?php

require_once __DIR__ . '/vendor/autoload.php';

// koneksi database
require 'assets/php/query.php';
$products=query("SELECT * FROM stok");

ob_clean();


	$mpdf = new \Mpdf\Mpdf();


$html='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- icon -->
	<link rel="icon" href="../assets/icon/icon.png">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
    <title>BandStore.</title>

		<style>
		tr:nth-child(even){
			background-color:#ddd;
		}
		
</style>

</head>
<body>

			<h1 style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">BandStore<span style=" color: red;font-size: 50px;">.</span></h1>
						<i style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">Laporan stok barang<span style=" color: red;font-size: 50px;">.</span></i>
			<div class="container" style="font-family:sans-serif;">

<table  border="1" cellpadding="10" cellspacing="0" style="width:100%;">
				<thead>
					<tr style="background-color:black;">
						<th style="color:white;">No</th>
						<th style="color:white;">Kode</th>
						<th style="color:white;">Nama</th>
						<th style="color:white;">Merk</th>
						<th style="color:white;">Jenis</th>
						<th style="color:white;">Jumlah</th>
					</tr>
				</thead>
			';

				$i=1;
foreach($products as $product){
	$html.='<tbody>
	<tr>
	<td>'.$i++.'</td>
	<td>'.$product["kode_produk"].'</td>
	<td>'.$product["nama_produk"].'</td>
	<td>'.$product["merk_produk"].'</td>
	<td>'.$product["jenis_produk"].'</td>
		<td>'.$product["jumlah_produk"].'</td>
	</tr>

</tbody>

	';
}

 $html.= '
					</table>
					</div>
					</body>
					</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('report-stok-barang.pdf', 'I');

?>