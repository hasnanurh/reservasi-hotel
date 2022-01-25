<?php 
//membuat format rupiah dengan PHP 
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function reset_rupiah($hasil_rupiah){
	$pecah = explode('.',$hasil_rupiah);
	$return		= implode('',$pecah);
	return  $return;
	}
	?>
