// ambil elemen2 yang dibutuhkan
var code = document.getElementById("kode_produk");
var max = document.getElementById("max");

// tambahkan event ketika keyboard ditulis
code.addEventListener("change", function () {
  // buat object ajax
  var xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      max.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "assets/ajax/returns.php?code=" + code.value, true);
  xhr.send();
});
