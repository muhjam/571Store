<?php 
require '../php/query.php';

$code=$_GET["code"];

if($code!=''){
$query="SELECT * FROM stok WHERE kode_produk='$code'
					";
$max= query($query)[0]['jumlah_produk'];
}

?>
	<input type="number" name="jumlah_produk" class="form-control" placeholder="Enter Quantity" id="jumlah_produk" min="1" value="1" max="<?= $max;?>" required>