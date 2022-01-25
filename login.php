<?php
session_start();
include 'koneksi.php';
?>
   


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
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

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#">
				<h3>Sistem Login</h3>
				<h5>CROWN HOTEL</h5>
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">

			<?php
			
			if(isset($_POST['login'])){
				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
				$tampil = mysqli_fetch_array($data);

				

				$username = $tampil['username'];
				$password = $tampil['password'];
				$level = $tampil['level'];
				$nama = $tampil['nama'];
				

				if($user == $username && $pass == $password && $level == 'admin'){
					$_SESSION['level'] = $level;
					$_SESSION['nama'] = $nama;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					header('Location:dashboard.php');
				}else{
					echo "
					<script>alert('Login Gagal!');</script>
					<span style='color:red'>Username/Password Salah</span>
	
					";
				}
			}

			?>

			<form action="" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="user" placeholder="Username" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="pass" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">

					</div>
					<!-- /.col -->
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary pull-right btn-block btn-flat" name="login" title="Masuk Sistem">
							<b>Masuk</b>
						</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			
			<!-- /.social-auth-links -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->


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
<script>
$(document).ready(function(){
  $('#example').DataTable();
});
</script>
	<!-- sweet alert -->
</body>
</html>