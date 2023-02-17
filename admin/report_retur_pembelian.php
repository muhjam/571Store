<?php

require_once __DIR__ . '/vendor/autoload.php';

// koneksi database
require 'assets/php/query.php';
$products=query("SELECT * FROM retur_pembelian ORDER BY tanggal_retur DESC");

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
						<i style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">Laporan retur pembelian<span style=" color: red;font-size: 50px;">.</span></i>
			<div class="container" style="font-family:sans-serif;">

<table  border="1" cellpadding="10" cellspacing="0" style="width:100%;">
				<thead>
					<tr style="background-color:black;">
						<th style="color:white;">No</th>
						<th style="color:white;">Tanggal</th>
						<th style="color:white;">Kode Pemasok</th>
						<th style="color:white;">Kode Barang</th>
						<th style="color:white;">Harga</th>
						<th style="color:white;">Jumlah</th>
						<th style="color:white;">Total</th>
					</tr>
				</thead>
			';

				$i=1;
foreach($products as $product){
	$html.='<tbody>
	<tr>
	<td>'.$i++.'</td>
	<td>'.date("d-m-Y", strtotime($product['tanggal_retur'])).'</td>
		<td>'.$product["kode_pemasok"].'</td>
	<td>'.$product["kode_produk"].'</td>
	<td>'.$product["harga_pembelian"].'</td>
		<td>'.$product["jumlah_produk"].'</td>
		<td>'.rupiah($product["harga_pembelian"]*$product['jumlah_produk']).'</td>
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
$mpdf->Output('report-retur-pembelian.pdf', 'I');

?>