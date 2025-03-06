<?php
include 'Dashboard_Koperasi/app/config/koneksi.php';
$query = "SELECT * FROM katagori_produk";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPERASI - Kreasi Anugrah Sejahtera</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/LOGO1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">

                    <h5 class="m-0"><img src="img/LOGO1.png" alt="LOGO1.png">KREASI ANUGRAH SEJAHTERA </h5>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index" class="nav-item nav-link">Home</a>
                        <a href="produk" class="nav-item nav-link active">Produk</a>
                        <a href="team" class="nav-item nav-link">Our Team</a>
                        <!--<div class="nav-item dropdown">-->
                        <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>-->
                        <!--    <div class="dropdown-menu m-0">-->
                        <!--        <a href="db" class="dropdown-item">LOG IN</a>-->
                        <!--        <a href="feature.html" class="dropdown-item">Features</a>-->
                        <!--        <a href="team.html" class="dropdown-item">Our Team</a>-->
                        <!--        <a href="testimonial.html" class="dropdown-item">Testimonial</a>-->
                        <!--        <a href="404.html" class="dropdown-item">404 Page</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                    </div>
                    <a href="Dashboard_Koperasi/dashboard" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">LOG IN</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary page-header">
                <div class="container text-center">
                    <h1 class="text-white animated zoomIn mb-4">Product</h1>
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="tile-body d-flex flex-wrap justify-content-center gap-2">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="card text-center bg-white m-1" style="width: 14rem;">
                                        <div class="card-body d-flex flex-column align-items-center p-2">
                                            <h5 class="card-title text-black text-center" style="border-bottom: 1px solid black; font-size: 14px;">
                                                <strong><?= $row['nama_produk'] ?></strong>
                                            </h5>
                                            <div style="width: 100%; height: 120px; background-color: white; display: flex; align-items: center; justify-content: center;">
                                                <img src="Dashboard_Koperasi/app/assets/img/produk/<?= $row['poto_produk']; ?>"
                                                    alt="<?= $row['poto_produk']; ?>"
                                                    style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                            </div>
                                            <!-- <a href="daftar.php" class="btn btn-warning btn-sm mt-2">Daftar Disini</a> -->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-white mb-4">Lokasi kami</h5>
                    <?php
                    // Koordinat untuk lokasi Anda

                    $latitude = 3.536116123814281;
                    $longitude = 98.73714831566002;

                    // Fungsi untuk menghasilkan URL Google Maps
                    function generateGoogleMapsURL($latitude, $longitude)
                    {
                        // Format URL untuk Google Maps dengan koordinat tertentu
                        $url = "https://www.google.com/maps?q={$latitude},{$longitude}";

                        return $url;
                    }

                    // Generate URL Google Maps
                    $url_google_maps = generateGoogleMapsURL($latitude, $longitude);
                    ?>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Komp. ATC, Blok F10 Medan</p>
                    <a href="<?php echo $url_google_maps; ?>" target="_blank" class="btn btn-primary">Lihat di Google Maps</a>
                    <p><i class="fa fa-phone-alt me-3 mt-4"></i>+62 812-3520-3441</p>
                    <!-- Tautan ke Google Maps -->

                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">kreasianugerahsejahtera.com</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">It_development</a>
                        <br>Distributed By : Kreasi Anugerah Sejahtera <a class="border-bottom" href="#"></a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <!--<a href="">Home</a>-->
                            <!--<a href="">Cookies</a>-->
                            <!--<a href="">Help</a>-->
                            <!--<a href="">FQAs</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>