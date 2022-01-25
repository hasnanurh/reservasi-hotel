<?php
include 'rupiah.php';
session_start();
$page="kamar";
$level = $_SESSION['level'];

if($level == "admin"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crown Hotel | Data Kamar</title>

    <link href="img/favicon.ico" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include"pages/sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kamar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Data Kamar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                <div class="modal fade" id="tambahData" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="simpankamar.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Kamar</label>
                            <input class="form-control" name="namakamar" autofocus required>
                          </div>
                        
                          <div class="form-group">
                            <label>Harga</label>
                            <input class="form-control" name="harga" type="number" required>
                          </div>
                          <div class="form-group">
                            <label>Jenis Kamar</label>
                            <select id="jeniskamar" required name="jeniskamar" class="form-control" onchange="changeValue(this.value)">
                                                
                                                 <?php 
                                                  include 'koneksi.php';
             
                                                    $sql = mysqli_query ($koneksi, "select * from tbl_jeniskamar");
                                                   $jsArray = "var prdName = new Array();\n";
                                                   while ( $data= mysqli_fetch_array($sql)) {
                                                  
                                                    echo '<option value="'.$data['id_jeniskamar'].'">'.$data['jenis_kamar'].'</option> ';
                                                    $jsArray .= "prdName['" . $data['id_jeniskamar'] . "'] = {harga:'" . addslashes($data['harga']) . "'};\n";
                                                  
                                                   }
                                                  ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Gambar</label>
                            <input class="form-control" name="file" type="file" required>
                          </div>
                          <div class="form-group">
                          <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-right" name="simpanSiswa">SIMPAN</button> 
                        <button class="btn btn-danger" type="reset">RESET</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';
                  
							$no = 1;
							$data = mysqli_query ($koneksi, " select *, tbl_kamar.harga as hargakamar, tbl_kamar.gambar as gambarkamar, tbl_jeniskamar.jenis_kamar from tbl_kamar inner join tbl_jeniskamar on tbl_jeniskamar.id_jeniskamar = tbl_kamar.id_jeniskamar");
							while ($row = mysqli_fetch_array ($data))
                
							{

						?>
						<tr>
							<td><?php echo $no++; ?></td>
              <td><?php echo $row['nama_kamar']; ?></td>
							<td><?php echo $row['jenis_kamar']; ?></td>
							<td><?php echo rupiah($row['hargakamar']); ?></td>
              <td><?php echo "<img src='img/$row[gambarkamar]'  width='100' height='100' /> " ?></td>
							<td>
							
							<!--	<a class="btn btn-danger btn-xs" href="hapus_siswa.php?id=<?php echo $row['id_siswa'];?>">Hapus</a> -->
              
                
              <a href="ubah_data.php?id=<?php echo $row['id_kamar']; ?>"class="btn btn-success btn-sm">Edit</a>
              <a href="#modalHapus" data-toggle="modal" onclick="$('#modalHapus #formHapus').attr('action', 'hapus_data.php?id=<?php echo $row['id_kamar'];?>')" class="btn btn-danger btn-sm">Hapus</a>
							
              <!--<a href="hapus_siswa.php?id=<?php echo $row['id_siswa']; ?>"class="btn_delete btn btn-danger btn-sm">Hapus</a>
              --></td>
						</tr>
						<?php
							}
						?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modalHapus" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Yakin Menghapus Data Ini?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-footer">
                      <form id="formHapus" action="hapus_siswa.php" method="POST">
                        <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
  </div>




  <div class="modal fade" id="modalKeluar" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Yakin Keluar?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-footer">
                      <form id="formKeluar" action="logout.php" method="POST">
                        <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-danger">Keluar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
  </div>


    </div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Crown Hotel</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$(document).ready(function(){
  $('#example').DataTable();
});


$('.btn_delete').on('click', function(e){

  e.preventDefault();
  const href = $(this).attr('href')

  swal.fire({
    title : 'Apa Kamu Yakin?',
    text : 'Data ini akan dihapus!',
    icon : 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data',
    buttonStyling: false,
  }).then((result) => {
      if(result.value) {

      Swal.fire(
      'Terhapus!',
      'Data Berhasil Dihapus.',
      'success'
    )
  
      }
  })

});


</script>
</body>
</html>

<?php

}else{
  header("Location:hal_user.php");
}

?>