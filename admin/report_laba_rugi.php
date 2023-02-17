<?php

require_once __DIR__ . '/vendor/autoload.php';

// koneksi database
require 'assets/php/query.php';

$time=time();
$month=date("m",$time);
$year=date("Y",$time);


// PENDAPATAN
$penjualan=query("SELECT SUM(a.harga_produk*b.jumlah_produk) penjualan FROM produk a INNER JOIN penjualan b ON a.kode_produk=b.kode_produk WHERE YEAR(tanggal_penjualan)=$year AND MONTH(tanggal_penjualan)=$month")[0]['penjualan'];

$retur_pembelian=query("SELECT SUM(harga_pembelian*jumlah_produk) retur FROM retur_pembelian")[0]['retur'];

// BEBAN
$gaji=query("SELECT SUM(gaji) gaji FROM karyawan")[0]['gaji'];

$retur_penjualan=query("SELECT SUM(b.harga_produk*a.jumlah_produk) retur FROM retur_penjualan a INNER JOIN produk b ON a.kode_produk=b.kode_produk")[0]['retur'];

$laba_bersih=($penjualan+$retur_pembelian)-($gaji+$retur_penjualan);
$hariIni = new DateTime();
$bulan=strftime('%B', $hariIni->getTimestamp()) ;
switch($bulan){
	case 'January':
		$bulan="Januari";
		break;
	case 'February':
		$bulan="Febuari";
		break;
	case 'March':
		$bulan="Maret";
		break;
	case 'April':
		$bulan="April";
		break;
	case 'May':
		$bulan="Mei";
		break;
	case 'June':
		$bulan="Juni";
		break;
	case 'july':
		$bulan="Juli";
		break;
	case 'August':
		$bulan="Agustus";
		break;
	case 'September':
		$bulan="September";
		break;
	case 'October':
		$bulan="Oktober";
		break;
	case 'November':
		$bulan="November";
		break;
	case 'December':
		$bulan="Desember";
		break;
}


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
    <title>bandstore.</title>

		<style>
		tr:nth-child(even){
			background-color:#ddd;
		}
		table {
    border-collapse:collapse;
    width:100%;
    max-width:700px;
    min-width:400px;
	}	
</style>

</head>
<body>

			<h1 style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">Laporan Laba Rugi</h1>
				<h2 style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">Bulan '.$bulan.' Tahun '.$year.' </h2>

			<div class="container" style="font-family:sans-serif;">

			<table border=“1” cellspacing="0" cellpadding="5">
				<thead>
					<tr style="background-color:black;">
						<th style="color:white;text-align:end;padding:2px 5px;" colspan="2">Pendapatan</th>
					</tr>
				</thead>
	<tbody>
		<tr>
			<td>Hasil Penjualan</td>
			<td>'.rupiah($penjualan).'</td>
		</tr>
		<tr>
			<td>Hasil Retur</td>
			<td>'.rupiah($retur_pembelian).'</td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
	</tbody>

	<thead>
					<tr style="background-color:black;">
						<th style="color:white;text-align:end;padding:2px 5px;" colspan="2">Beban</th>
					</tr>
				</thead>
	<tbody>
		<tr>
			<td>Beban Gaji</td>
			<td>'.rupiah($gaji).'</td>
		</tr>

			<tr>
			<td>Beban Retur</td>
			<td>'.rupiah($retur_penjualan).'</td>
		</tr>

		<tr>
			<td>Beban Lain-lain</td>
			<td>'.rupiah($pendapatan).'</td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td>Laba Bersih</td>
			<td>'.rupiah($laba_bersih).'</td>
		</tr>
	</tbody>

			';

 $html.= '
					</table>
					</div>
					</body>
					</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('report-laba-rugi.pdf', 'I');

?>