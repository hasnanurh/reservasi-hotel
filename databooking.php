<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Crown Hotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Crown</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">crown@gmail.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+012 345 6789</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                                <a class="me-3" href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                                <a class="" href="https://youtube.com"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                       
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link ">Home</a>
                                <a href="about.php" class="nav-item nav-link active">Tentang Kami</a>
                                <a href="room.php" class="nav-item nav-link ">Daftar Kamar</a>
                                <a href="booking.php" class="nav-item nav-link">Pemesanan</a>
                                 <a href="databooking.php" class="nav-item nav-link  ">Daftar Pesanan</a>
                                
                                
                            </div>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Pemesanan</h1>
                    <nav aria-label="breadcrumb">
                        
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        
        <!-- Booking End -->


        <!-- Booking Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase"> Data Pemesanan</h6><br><br>
                </div>
                <?php

    include 'koneksi.php';
    $query = mysqli_query($koneksi,"select *, tbl_jeniskamar.jenis_kamar from tbl_pesanan inner join tbl_jeniskamar on tbl_jeniskamar.id_jeniskamar = tbl_pesanan.id_jeniskamar");
    ?>

    
    <form action="" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">No Identitas</th>
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Pengaturan</th>
            </tr>
            <tbody>
        <?php

             $no=1;
            while($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                <td align="center"><?php echo $no?></td>
                <td align="center"><?php echo $data['no_identitas'];?></td>
                <td align="center"><?php echo $data['nama_pemesan'];?></td>
                <td align="center"><?php echo $data['jenis_kelamin'];?></td>
                <td align="center">
                    <a  href="detailbooking.php?id_pesanan=<?php echo $data['id_pesanan'];?>" class="btn btn-danger btn-sm">Detail</a></td>
                </tr>
                <?php $no++; } ?>
          
        </tbody>
        </table>
        <div class="col-lg-2">
        </div>
    </form>
            </div>
        </div>
        <!-- Booking End -->


        <!-- Newsletter Start -->
       <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                           
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->
        

        <!-- Footer Start -->
         <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="index.php"><h1 class="text-white text-uppercase mb-3">Crown Hotel</h1></a>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>crown@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://youtube.com"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Menu</h6>
                                <a class="btn btn-link" href="index.php">Home</a>
                                <a class="btn btn-link" href="about.php">Tentang Kami</a>
                                <a class="btn btn-link" href="room.php">Daftar Kamar</a>
                                <a class="btn btn-link" href="booking.php">Pemesanan</a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Crown Hotel</a>, All Right Reserved. 
                            
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('harga').value = prdName[x].harga;   
    };  
    </script>

    <script type="text/javascript">
        function hitung(){
            var durasi= parseInt(document.getElementById('durasi').value);
            var harga  = parseInt(document.getElementById('harga').value);
            var diskon  = document.getElementById('diskon').value = 0.1;
            var diskon1  = document.getElementById('diskon1').value = 10;


            if(durasi > 3){
                 var hasil= durasi * harga * diskon;
                 document.getElementById('totalbayar').value = hasil;
            }
             if(durasi <= 3){
                 var hasil= durasi * harga;
                 document.getElementById('totalbayar').value = hasil;
            }
                
           
       
        
        }
       
    </script>

</body>

</html>