<?php


if($page=="kamar") {
  $kamarAktif = 'nav-link active';
}elseif($page=="dashboard"){
  $indexAktif = 'nav-link active';
}


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CROWN HOTEL</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <a href="#" class="d-block"><?=$_SESSION['nama']?></a><span style="color:orange;"><?=$_SESSION['level']?></span>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="button" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">MENU ADMIN</li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?=$indexAktif?>">
				<i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_data.php" class="nav-link <?=$kamarAktif?>">
                  <i class="fas fa-bed nav-icon"></i>
                  <p>Kamar</p>
                </a>
              </li>
              
              <hr>
              <li class="nav-item">
                <a href="#modalKeluar" data-toggle="modal" onclick="$('#modalKeluar #formKeluar').attr('action', 'logout.php')" class="nav-link">
				<i class="fas fa-sign-out-alt text-danger nav-icon"></i>
                  <p>LOGOUT</p>
                </a>
              </li>
            </ul>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>