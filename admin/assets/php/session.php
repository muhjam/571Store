<?php 
// memeriksa sudah login atau belum
session_start();
require 'assets/php/query.php';

if(isset($_SESSION['kode_pengguna'])){
	$kode_pengguna=$_SESSION['kode_pengguna'];
	$pengguna=query("SELECT * FROM pengguna WHERE kode_pengguna='$kode_pengguna'")[0];
}else{
header("location:../../../logout.php");
}
 ?>