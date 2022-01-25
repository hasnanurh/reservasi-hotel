<?php
//pemanggilan file koneksi
include 'koneksi.php';


$nama         = $_POST['nama'];
$identitas    = $_POST['identitas'];
$jeniskelamin = $_POST['jeniskelamin'];
$jeniskamar   = $_POST['jeniskamar'];
$durasi       = $_POST['durasi'];
$diskon       = $_POST['diskon1'];
$totalbayar   = $_POST['totalbayar'];
$tanggal      = $_POST['tanggal'];


//sesuaikan nama dan atribut tabel yang telah dibuat
if ($durasi > 3) {
	$query = mysqli_query($koneksi, "INSERT INTO tbl_pesanan (nama_pemesan,tanggal_pesanan,no_identitas,jenis_kelamin, id_jeniskamar, durasi, diskon, total_bayar) VALUES ('$nama','$tanggal', '$identitas','$jeniskelamin', '$jeniskamar', '$durasi', '$diskon', '$totalbayar')") or die(mysqli_error($koneksi));

	if($query) {
	    echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
	} else {
	    echo "<script>alert('Data gagal ditambahkan');</script>";
	}
}elseif ($durasi <= 3) {
	$query = mysqli_query($koneksi, "INSERT INTO tbl_pesanan (nama_pemesan,tanggal_pesanan, no_identitas,jenis_kelamin, id_jeniskamar, durasi, diskon, total_bayar) VALUES ('$nama','$tanggal', '$identitas','$jeniskelamin', '$jeniskamar', '$durasi', '0', '$totalbayar')") or die(mysqli_error($koneksi));

if($query) {
    echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}
}


mysqli_close($koneksi);
	
?>