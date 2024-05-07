    <?php
    include '../../../app/config/koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM tb_notif WHERE id_notif = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <title>Informasi</title>
        <link href="../../../img/LOGO1.png" rel="icon">

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
        <link rel="stylesheet" href="assets/css/owl.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <!--

    TemplateMo 591 villa agency

    https://templatemo.com/tm-591-villa-agency

    -->
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <h1>Informasi</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <!-- <ul class="nav"> -->
                        <!-- <li><a href="index.html">Home</a></li>
                        <li><a href="properties.html">Properties</a></li> -->
                        <!-- <li><a href="property-details.html" class="active">Property Details</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li> -->
                        <!-- </ul>    -->
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading header-text">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <!-- <span class="breadcrumb"><a href="#">Home</a>  /  Single Property</span> -->
            <h3>KREASI ANUGERAH SEJAHTERA</h3>
            </div>
        </div>
        </div>
    </div>

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-image">
                        <img id="preview" src="../../../app/assets/img/img_notif/<?= $row['image'] ?>" alt="Preview" >
                    </div>
                    <div class="main-content">
                        <!-- <span class="category">Apparment</span> -->
                        <h4><?= $row['nama_notif']; ?></h4>
                        <p><?= nl2br($row['isi_notif']); ?></p>
                    </div> 
                    <!-- <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Best useful links ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How does this work ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Why is Villa the best ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-4">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="assets/images/berkah.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkgoldenrod;">Keberkahan</h4>
                            </li>
                            <li>
                                <img src="assets/images/adil.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkred;">Berkeadilan</h4>
                            </li>
                            <li>
                                <img src="assets/images/bersama.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkorange;">Kebersamaan</h4>
                            </li>
                            <li>
                                <img src="assets/images/peduli.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkmagenta;">Peduli</h4>
                            </li>
                            <li>
                                <img src="assets/images/pemberdaya.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkgreen;">Pemberdayaan</h4>
                            </li>
                            <li>
                                <img src="assets/images/pemasaran.png" alt="" style="max-width: 52px;">
                                <h4 style="color: darkturquoise;">Pemasaran Bersama</h4>
                            </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Find Your Best Deal Right Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartment</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                                </li>
                                </ul>
                            </div>              
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-no-gap">
        <div class="container">
        <div class="col-lg-12">
            <p>Copyright © 2024 Kreasi Anugerah Sejahtera. @IT_Dev. 
            
            <!-- Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p> -->
        </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>

    </body>
    </html>