<?php

include 'koneksi.php';
$id = $_GET["id"];



//$sql_hapus = "DELETE a.*, b.* FROM siswa a JOIN tabungan b ON a.id_siswa = b.id_siswa WHERE a.id_siswa = $id";
$sql_hapus = "DELETE FROM tbl_kamar WHERE id_kamar='".$_GET['id']."'";
mysqli_query($koneksi, $sql_hapus);
 
if( $id > 0 ){
	echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'view_data.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('Data gagal dihapus!');
				document.location.href = 'view_data.php';
			</script>
		";
}

?>