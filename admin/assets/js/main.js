function previewImage() {
  const gambar = document.querySelector("#image");
  const imgPreview = document.querySelector("#img-preview");
  imgPreview.style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}
/* Dengan Rupiah */
var harga = document.getElementById("harga");

harga.addEventListener("keyup", function (e) {
  harga.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
