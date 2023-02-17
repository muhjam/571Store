<!-- ANALOGI TEMEN NUNJUKIN BAJU KELUARIN DULU BAJUNYA KEBASKOM BARU TUNJUKIN -->

<!-- RESULT ITU DI ANALOGIKAN LEMARI -->

<?php
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'bandstore') or die('KONEKSI GAGAL!!');

    return $conn;
}

function query($query) {
   $conn=koneksi();
    
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



// TAMBAH
function tambah_produk($data) {
   $conn=koneksi();

// cek apakah user tidak mengupload gambar
if($_FILES["gambar_produk"]["error"]===4){
    $gambar_produk='nophoto.png';
}else{
    // jalankan fungsi upload
    $gambar_produk=upload();
    // cek jika upload gagal
    if(!$gambar_produk){
        return false;
    }
}


    $kode_produk =($data["kode_produk"]);
    $harga_produk =preg_replace("/[^0-9]/", "", $data['harga_produk']);
    $keterangan_produk =$data["keterangan_produk"];
    $keteranganBaru= preg_replace("/\r\n|\r|\n/", '<br/>', str_replace("'","",$keterangan_produk));

    // query insert data
    $query ="INSERT INTO `produk`(`gambar_produk`,`kode_produk`, `harga_produk`, `keterangan_produk`) VALUES ('$gambar_produk','$kode_produk','$harga_produk','$keteranganBaru');
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Function Upload
function upload(){
   // siapkan data gambar
    $filename=$_FILES['gambar_produk']['name'];
    $filetmpname=$_FILES['gambar_produk']['tmp_name'];
    $filesize=$_FILES['gambar_produk']['size'];
    $filetype=pathinfo($filename, PATHINFO_EXTENSION);
    $allowedtype=['jpg', 'jpeg', 'png'];

   $filetype=strtolower($filetype);

    // cek apakah yang diupload bukan gambar
    if(!in_array($filetype, $allowedtype)){
    echo"<script>
    alert('Yang anda upload bukan gambar!');
    </script>";

    return false;
    }

    // cek apakah gambar terlalu besar
    if($filesize > 1000000){
    echo"<script>
    alert('Ukuran gambar terlalu besar!');
    </script>";
    
    return false;
    }

    // proses upload gambar

    $newfilename = uniqid() . $filename;

    move_uploaded_file($filetmpname, '../assets/img/' . $newfilename);

    return $newfilename;
}


// Function delete
function hapus_produk($data) {
   $conn=koneksi();
   $kode_produk=$data['kode_produk'];
    // query mahasiswa berdasarkan id
$produk=query("SELECT * FROM produk WHERE kode_produk='$kode_produk'")[0];

// cek jika gambar default
if($produk["gambar_produk"]!=='nophoto.png'){
    // hapus gambar
    unlink('../assets/img/' . $produk["gambar_produk"]);
}

    mysqli_query($conn, "DELETE FROM produk WHERE `produk`.`kode_produk` = '$kode_produk'");
    return mysqli_affected_rows($conn);

}

// Ubah data
function ubah_produk($data) {
   $conn=koneksi();
    $kode_produk =$data["kode_produk"];
    $harga_produk =preg_replace("/[^0-9]/", "", $data['harga_produk']);
    $keterangan_produk =$data["keterangan_produk"];
    $keteranganBaru= preg_replace("/\r\n|\r|\n/", '<br/>', str_replace("'","",$keterangan_produk));
    $gambarLama=$data["gambar_produk_lama"];

    // cek apakah user pilih gambar baru atau tidak
if($_FILES['gambar_produk']['error']===4){
    $gambar_produk=$gambarLama;
}else{
    $gambar_produk=upload();

    // cek jika upload gagal
    if(!$gambar_produk){
        return false;
    }    
        // hapus gambar lama
    unlink('../assets/img/'.$gambarLama);
}

// query insert data
    $query ="UPDATE `produk` SET gambar_produk='$gambar_produk', kode_produk='$kode_produk',harga_produk='$harga_produk',keterangan_produk='$keteranganBaru' WHERE kode_produk='$kode_produk';
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}




//  Function cari
function search($search){

$query = "SELECT * FROM produk
             WHERE
            nama_produk LIKE '%$search%' OR
            jenis_produk LIKE '%$search%' OR
            ukuran LIKE '%$search%' OR
            harga LIKE '%$search%' OR
            kode_produk LIKE '%$search%' OR
            keterangan LIKE '%$search%'
            ORDER BY id
            ";

              return query ($query);    
}



//  Function cari
function type($keyword){

$keyword=$_GET['type'];

   $query = "SELECT * FROM produk
              WHERE jenis_produk = '$keyword'
            ";

              return query($query);

    
}

// function kode_aktifasi
function gen_uid($l=6){
    return substr(uniqid(), 7, $l);
} 


// function aktifasi
function aktifasi($data){
   $conn=koneksi();
$kode_aktifasi=$data["kode_aktifasi"];


        $query = "UPDATE `users` SET `status`='on' WHERE `kode_aktifasi`='$kode_aktifasi';
                ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

    
} 

// function mengubah kode aktifasi
function updateAktifasi($data){
   $conn=koneksi();
$email=htmlspecialchars($data["email"]);
$kode_aktifasi=$data["kode_aktifasi"];
    
$query = "UPDATE `users` SET `kode_aktifasi`='$kode_aktifasi'WHERE `email`='$email'";
mysqli_query($conn, $query);

 return mysqli_affected_rows($conn);
}

// function aktifasi
function updateEmail($data){
   $conn=koneksi();
     $username= htmlspecialchars(stripslashes($data["username"]));
    $email=htmlspecialchars($data["email"]);
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
    $kode_aktifasi=$data["kode_aktifasi"];


        $query = "UPDATE `users` SET `status`='on' WHERE `kode_aktifasi`='$kode_aktifasi';
                ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
} 



// Signup
function signup($data){
   $conn=koneksi();

    $username= htmlspecialchars(stripslashes($data["username"]));
    $email=htmlspecialchars($data["email"]);
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
    $kode_aktifasi=$data["kode_aktifasi"];


    // cek konsfirmasi password
    if($password !== $password2){
        echo "
        <script>
        alert('konfirmasi password tidak sesuai!');
        document.location.href='signup.php'
        </script>
        ";
        
        return false;
    }


    // enkriosi password
$password=password_hash($password, PASSWORD_DEFAULT);   




    // tambahkan user baru ke database
mysqli_query($conn, "INSERT INTO `users`(`username`,`email`, `password`,  `level`, `kode_aktifasi`) VALUES ('$username','$email','$password','user','$kode_aktifasi')");

return mysqli_affected_rows($conn);

}





// Change Password
// Change
function changepw($data){
   $conn=koneksi();

    $email=htmlspecialchars($data["email"]);
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);


    // enkriosi password
$password=password_hash($password, PASSWORD_DEFAULT);   

// tambahkan user baru ke database
mysqli_query($conn, "UPDATE users SET password='$password' WHERE email='$email'");


return mysqli_affected_rows($conn);




}




//rupiah
function rupiah($harga){
	global $conn;

	$hasil_rupiah = "Rp. " . number_format($harga,2,',','.');
	return $hasil_rupiah;
}

function rupiahnokoma($harga){
	global $conn;

	$hasil_rupiah = "Rp. " . number_format($harga,0,',','.');
	return $hasil_rupiah;
}

function rupiah2($harga){
	global $conn;

	$hasil_rupiah = "Rp. " . number_format($harga,0,',','.');
	return $hasil_rupiah;
 

}



//rupiah
function idr($harga){
	global $conn;

	$hasil_rupiah = "IDR " . number_format($harga,0,',','.');
	return $hasil_rupiah;
 
}


// profile
function editFoto($data){
$conn=koneksi();

     $id=htmlspecialchars($data["id"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
if($_FILES['gambar']['error']===4){
    $gambar=$gambarLama;
}else if($gambarLama=='default.png'){
    $gambar=uploadProfile();

    // cek jika upload gagal
    if(!$gambar){
        return false;
    }    



}else{
      $gambar=uploadProfile();

    // cek jika upload gagal
    if(!$gambar){
        return false;
    }    

        // hapus gambar lama
    unlink('../profile/' . $gambarLama);
}


$query = "UPDATE `users` SET `foto`='$gambar' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}





function edit($data){

$conn=koneksi();

    $id=htmlspecialchars($data["id"]);
    $username =htmlspecialchars(stripslashes($data["username"]));
    $email= htmlspecialchars($data["email"]);
    $noTelp = ($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gender = htmlspecialchars($data["gender"]);
    $lahir=htmlspecialchars($data["lahir"]);

    $emaillama=$_SESSION['email'];




if($email==$emaillama){
$query = "UPDATE `users` SET `username`='$username',`no_telp`='$noTelp',`gender`='$gender',`alamat`='$alamat',`lahir`='$lahir' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// Cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");

if(mysqli_fetch_assoc($result)){
echo"
<script>
alert('Email sudah terdaftar!')
document.location.href='profile-edit.php'
</script>
";

return false;
}

// username nya tidak ada yang sama


  // cek apakah user pilih gambar baru atau tidak

if($emaillama!=$email){

$query = "UPDATE `users` SET `username`='$username',`no_telp`='$noTelp',`gender`='$gender',`alamat`='$alamat',`lahir`='$lahir' WHERE `id`='$id'; ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}




}



// Function ubah level
function adminLevel($id) {
   $conn=koneksi();

    mysqli_query($conn, "UPDATE users SET level='admin' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}

function userLevel($id) {
   $conn=koneksi();

    mysqli_query($conn, "UPDATE users SET level='user' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}



// Function ban
function banLevel($id) {
   $conn=koneksi();

    mysqli_query($conn, "UPDATE users SET status='ban' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}


// Function heal
function healLevel($id) {
   $conn=koneksi();

    mysqli_query($conn, "UPDATE users SET status='on' WHERE `users`.`id` = '$id'");
    return mysqli_affected_rows($conn);
}

// TAMBAH
function tambah_karyawan($data) {
   $conn=koneksi();
   		// menghitung jumlah barang
$jumlah_karyawan = query("SELECT count(*)  jumlah_karyawan FROM karyawan")[0]['jumlah_karyawan'];
// menentukan kode barang
$kode_karyawan=$jumlah_karyawan+1;
switch (strlen($kode_karyawan)) {
  case 1:
    $kode_karyawan='EM00'.$kode_karyawan;
    break;
  case 2:
     $kode_karyawan='EMP0'.$kode_karyawan;
    break;
  case 3:
    $kode_karyawan='EM'.$kode_karyawan;
    break;
}
    $nama_karyawan= htmlspecialchars($data["nama_karyawan"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $gaji=preg_replace('/[^0-9]/', '', $data['gaji']);
    // query insert data
    $query ="INSERT INTO `karyawan`(`kode_karyawan`, `nama_karyawan`, `jabatan`, `gaji`) VALUES ('$kode_karyawan','$nama_karyawan','$jabatan','$gaji');";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubah_karyawan($data) {
   $conn=koneksi();
   	$kode_karyawan=htmlspecialchars($data["kode_karyawan"]);
    $nama_karyawan= htmlspecialchars($data["nama_karyawan"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $gaji=preg_replace('/[^0-9]/', '', $data['gaji']);
    // query insert data

    $query ="UPDATE karyawan SET kode_karyawan='$kode_karyawan',nama_karyawan='$nama_karyawan', jabatan='$jabatan', gaji='$gaji' WHERE kode_karyawan ='$kode_karyawan';    
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function hapus_karyawan($data) {
   $conn=koneksi();
   	
// menentukan kode barang
    $kode_karyawan=$data['kode_karyawan'];

    // query insert data
    $query ="DELETE FROM karyawan WHERE kode_karyawan='$kode_karyawan';";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_pembelian($data) {
   $conn=koneksi();
   		// menghitung jumlah barang
$jumlah_pembelian = query("SELECT count(*)  jumlah_pembelian FROM pembelian")[0]['jumlah_pembelian'];
// menentukan kode barang
$kode_pembelian=$jumlah_pembelian+1;
switch (strlen($kode_pembelian)) {
  case 1:
    $kode_pembelian='PM00'.$kode_pembelian;
    break;
  case 2:
     $kode_pembelian='PM0'.$kode_pembelian;
    break;
  case 3:
    $kode_pembelian='PM'.$kode_pembelian;
    break;
}
    $tanggal_pembelian= htmlspecialchars($data["tanggal_pembelian"]);
    $nama_produk= htmlspecialchars($data["nama_produk"]);
    $merk_produk= htmlspecialchars($data["merk_produk"]);
    $jenis_produk = htmlspecialchars($data["jenis_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $harga_produk=preg_replace('/[^0-9]/', '', $data['harga_produk']);
    // query insert data
    $query ="INSERT INTO `pembelian`(`tanggal_pembelian`,`kode_pembelian`, `nama_produk`, `merk_produk`, `jenis_produk`, `jumlah_produk`,`harga_produk`) VALUES ('$tanggal_pembelian','$kode_pembelian','$nama_produk','$merk_produk','$jenis_produk','$jumlah_produk','$harga_produk');";

    // tabel stok
    $cek = query("SELECT count(*)  cek FROM stok WHERE nama_produk='$nama_produk' AND jenis_produk='$jenis_produk'")[0]['cek'];

    if($cek>0){
        $stok=query("SELECT * FROM stok WHERE nama_produk='$nama_produk'")[0];
        $kode_produk=$stok['kode_produk'];
        $total=$stok['jumlah_produk']+$jumlah_produk;
        $query_stok ="UPDATE stok SET jumlah_produk='$total' WHERE kode_produk ='$kode_produk'; 
        ";
        mysqli_query($conn, $query_stok);
    }else{
            $jumlah_stok = query("SELECT count(*)  jumlah_stok FROM stok ")[0]['jumlah_stok'];
            $kode_produk=$jumlah_stok+1;
            switch (strlen($kode_produk)) {
            case 1:
                $kode_produk='IP00'.$kode_produk;
                break;
            case 2:
                $kode_produk='IP0'.$kode_produk;
                break;
            case 3:
                $kode_produk='IP'.$kode_produk;
                break;
            }
            $query_stok ="INSERT INTO `stok`(`kode_produk`, `nama_produk`, `merk_produk`, `jenis_produk`, `jumlah_produk`) VALUES ('$kode_produk','$nama_produk','$merk_produk','$jenis_produk','$jumlah_produk');";
            mysqli_query($conn, $query_stok);
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_pembelian($data) {
   $conn=koneksi();
   	$kode_pembelian=htmlspecialchars($data["kode_pembelian"]);
    $tanggal_pembelian= htmlspecialchars($data["tanggal_pembelian"]);
    $nama_produk= htmlspecialchars($data["nama_produk"]);
    $jenis_produk = htmlspecialchars($data["jenis_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $harga_produk=preg_replace('/[^0-9]/', '', $data['harga_produk']);
    // query insert data

    $query ="UPDATE pembelian SET kode_pembelian='$kode_pembelian',tanggal_pembelian='$tanggal_pembelian', nama_produk='$nama_produk',merk_produk='$merk_produk', jenis_produk='$jenis_produk', jumlah_produk='$jumlah_produk', harga_produk='$harga_produk' WHERE kode_pembelian ='$kode_pembelian';    
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_pembelian($data) {
   $conn=koneksi();
   	
// menentukan kode barang
$kode_pembelian=$data['kode_pembelian'];

    // query insert data
    $query ="DELETE FROM pembelian WHERE kode_pembelian='$kode_pembelian';";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function tambah_retur_pembelian($data) {
   $conn=koneksi();
    $kode_pemasok= htmlspecialchars($data["kode_pemasok"]);
    $tanggal_retur= htmlspecialchars($data["tanggal_retur"]);
    $kode_produk= htmlspecialchars($data["kode_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $harga_pembelian=preg_replace('/[^0-9]/', '', $data['harga_pembelian']);
    // query insert data
    $query ="INSERT INTO `retur_pembelian`(`kode_pemasok`,`kode_produk`, `jumlah_produk`, `harga_pembelian`, `tanggal_retur`) VALUES ('$kode_pemasok','$kode_produk','$jumlah_produk','$harga_pembelian','$tanggal_retur');";
  mysqli_query($conn, $query);
        $stok=query("SELECT * FROM stok WHERE kode_produk='$kode_produk'")[0];
        $kode_produk=$stok['kode_produk'];
        $total=$stok['jumlah_produk']-$jumlah_produk;
        $query_stok ="UPDATE stok SET jumlah_produk='$total' WHERE kode_produk ='$kode_produk'; 
        ";
        mysqli_query($conn, $query_stok);
    return mysqli_affected_rows($conn);
}

// function ubah_pembelian($data) {
//    $conn=koneksi();
//    	$kode_pembelian=htmlspecialchars($data["kode_pembelian"]);
//     $tanggal_pembelian= htmlspecialchars($data["tanggal_pembelian"]);
//     $nama_produk= htmlspecialchars($data["nama_produk"]);
//     $jenis_produk = htmlspecialchars($data["jenis_produk"]);
//     $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
//     $harga_produk=preg_replace('/[^0-9]/', '', $data['harga_produk']);
//     // query insert data

//     $query ="UPDATE pembelian SET kode_pembelian='$kode_pembelian',tanggal_pembelian='$tanggal_pembelian', nama_produk='$nama_produk',merk_produk='$merk_produk', jenis_produk='$jenis_produk', jumlah_produk='$jumlah_produk', harga_produk='$harga_produk' WHERE kode_pembelian ='$kode_pembelian';    
//     ";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }

// function hapus_pembelian($data) {
//    $conn=koneksi();
   	
// // menentukan kode barang
// $kode_pembelian=$data['kode_pembelian'];

//     // query insert data
//     $query ="DELETE FROM pembelian WHERE kode_pembelian='$kode_pembelian';";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }




function tambah_stok($data) {
   $conn=koneksi();
   		// menghitung jumlah barang
$jumlah_pembelian = query("SELECT count(*)  jumlah_pembelian FROM pembelian")[0]['jumlah_pembelian'];
// menentukan kode barang
$kode_pembelian=$jumlah_pembelian+1;
switch (strlen($kode_pembelian)) {
  case 1:
    $kode_pembelian='PM00'.$kode_pembelian;
    break;
  case 2:
     $kode_pembelian='PM0'.$kode_pembelian;
    break;
  case 3:
    $kode_pembelian='PM'.$kode_pembelian;
    break;
}
    $tanggal_pembelian= htmlspecialchars($data["tanggal_pembelian"]);
    $nama_produk= htmlspecialchars($data["nama_produk"]);
    $jenis_produk = htmlspecialchars($data["jenis_produk"]);
    $jumlah_produk = htmlspecialchars($data["jumlah_produk"]);
    $harga_produk=preg_replace('/[^0-9]/', '', $data['harga_produk']);
    // query insert data
    $query ="INSERT INTO `pembelian`(`tanggal_pembelian`,`kode_pembelian`, `nama_produk`, `jenis_produk`, `jumlah_produk`,`harga_produk`) VALUES ('$tanggal_pembelian','$kode_pembelian','$nama_produk','$jenis_produk','$jumlah_produk','$harga_produk');";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>