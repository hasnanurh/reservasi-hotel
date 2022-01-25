<?php
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
  <title>Crown Hotel | Ubah Data Kamar</title>

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
        <a href="index.php" class="nav-link">Home</a>
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
            <h1>Ubah Data Kamar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Kamar</li>
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

<?php

include "koneksi.php";

$id = $_GET['id'];
if(isset($_POST['update'])){

  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg');
  $gambar                 = $_FILES['file']['name'];
  $x                      = explode('.', $gambar);
  $ekstensi               = strtolower(end($x));
  $ukuran                 = $_FILES['file']['size'];
  $file_tmp               = $_FILES['file']['tmp_name'];

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1044070){      
      move_uploaded_file($file_tmp, 'img/'.$gambar);
      $query_update=mysqli_query($koneksi,"UPDATE tbl_kamar SET 
          nama_kamar ='$_POST[nama]',
          id_jeniskamar ='$_POST[jeniskamar]',
          harga='$_POST[harga]',
          deskripsi='$_POST[deskripsi]', 
          gambar='$gambar' WHERE id_kamar= $id");
          if($query_update){
              echo"
                <script>
                alert('Data berhasil diubah!');
                document.location.href = 'view_data.php';
              </script>
                ";
          }else{
             echo"
              <script>
              alert('Data gagal diubah!');
              document.location.href = 'view_data.php';
            </script>
              ";
          }
        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }
      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }  
	

}

$query = "SELECT * FROM tbl_kamar WHERE id_kamar=$id";
$query_run = mysqli_query($koneksi, $query);

if($query_run){
  while($row = mysqli_fetch_array($query_run))
  {
    ?>

      <form role="form" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama</label>
          <input type="hidden" name="idkamar" value="<?php echo $row['id_kamar'] ; ?>">
          <input class="form-control" name="nama" value="<?php echo $row['nama_kamar'] ; ?>" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input class="form-control" name="harga" value="<?php echo $row['harga'] ; ?>" type="number" required>
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
          <label>Deskripsi</label>
          <textarea required name="deskripsi" class="form-control" rows="3"><?php echo $row['deskripsi'] ; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary pull-right">Simpan</button> 
        <a href="view_data.php" class="btn btn-success pull-right" style="margin-right:1%;">Batal</a>
      </form>


    <?php
  }
}else{
  echo"
  <script>
  alert('Data gagal diubah!');
  document.location.href = 'view_data.php';
</script>
  ";
}

?>
	


              


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
<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('harga').value = prdName[x].harga;   
    };  
    </script>
</body>
</html>


<?php

}else{
  header("Location:hal_user.php");
}

?>