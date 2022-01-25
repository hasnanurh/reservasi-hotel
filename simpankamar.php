<?php
//pemanggilan file koneksi
include 'koneksi.php';


$nama      = $_POST['namakamar'];
$jenis     = $_POST['jeniskamar'];
$harga     = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];


$ekstensi_diperbolehkan	= array('png','jpg');
$gambar = $_FILES['file']['name'];
$x = explode('.', $gambar);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];	
 
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, 'img/'.$gambar);
			$query = mysqli_query($koneksi, "INSERT INTO tbl_kamar (nama_kamar,id_jeniskamar,harga, gambar, deskripsi) VALUES ('$nama', '$jenis','$harga', '$gambar', '$deskripsi')") ;
					if($query){
						 echo "<script>alert('Data berhasil ditambahkan!');window.location='view_data.php';</script>";
					}else{
						 echo "<script>alert('Data gagal ditambahkan');</script>";
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
	
mysqli_close($koneksi);
	
?>