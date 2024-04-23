 
<!DOCTYPE html>
<html lang="en">
    
  <?php 
    include("Dashboard_Koperasi/app/config/koneksi.php");
        $sql= mysqli_query($koneksi, "SELECT * FROM tb_notif ORDER BY id_notif DESC") or die(mysqli_error($koneksi));
        $result = array();
        while ($data = mysqli_fetch_array($sql)) {
            $result[] = $data;
        }
        foreach ($result as $data) {
        }
    ?>

        


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
                    <h5 class="m-0"><img src="img/LOGO1.png" alt="LOGO1.png">KREASI ANUGRAH SEJAHTERA </h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="produk.html" class="nav-item nav-link">Produk</a>
                        <a href="team.html" class="nav-item nav-link">Our Team</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                    </div>
                    <a href="Dashboard_Koperasi" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">LOG IN</a>
                </div>
            </nav>
            <div class="container-xl bg-primary hero-header">
                <div class="container">
                    <div class="row bg-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                                                       <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>KOPERASI - Kreasi Anugrah Sejahtera</title>
                                <style>
                                    .quote {
                                        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
                                        font-family: 'Heebo', sans-serif;
                                        font-size: 24px;
                                        color: #fff; /* Warna teks putih */
                                        margin-bottom: 20px; /* Margin bawah */
                                    }
                            
                                    .author {
                                        font-size: 20px; /* Ukuran font untuk penulis */
                                        font-style: italic; /* Gaya italic untuk penulis */
                                    }
                            
                                    /* Animasi */
                                    @keyframes zoomIn {
                                        from {
                                            transform: scale(0);
                                        }
                                        to {
                                            transform: scale(1);
                                        }
                                    }
                            
                                    .animated {
                                        animation-duration: 1 s;
                                        animation-fill-mode: both;
                                    }
                            
                                    .zoomIn {
                                        animation-name: zoomIn;
                                    }
                                </style>
                            </head>
                            <body>
                            
                            <h3 class="quote text-white mb-4 animated zoomIn">"Kemauan menabung itu adalah gambaran dari kesadaran koperasi dan keyakinan berkoperasi. Jiwa pendorong koperasi adalah self-help, menolong diri sendiri. . . . . . . ! "</h3>
                            <h4 class="author text-white mb-4 animated zoomIn">- Moh. Hatta (Bapak Koperasi Indonesia)</h4>
                            
                            </body>
                            </html>

                            <p class="text-white pb-3 animated zoomIn">
                            <div class="container-notif">
                
                    <!-- <div class="form-notif">
                        <img class="photo-footer" src="Dashboard_Koperasi/app/assets/img/notif.png">
                    </div> -->
                    <br>

                    <div class="form-notif">
                        <div class="content-notif">
                        <h6 class="judul-notif">INFORMASI :</h6>
                            <h8 class="judul-notif"></h8>
                        </div>
                         <marquee direction="left" scrollamount="10" align="center"><strong>
                        <div class="content-notif">
                            <h6 class="isi-notif"> <b>Ayoo, Terus di pantau dan Login user dashboard anda untuk melihat Promo menarik dari KAMI, ini merupakan sarana media digitalisasi dari perkembangan Tekhnologi Digital, Jangan sampai ketinggalan untuk Informasinya, Salam . !</b>    </h6>
                        </div>
                        <strong></marquee>
                    </div>
                </a>
        </div>

        </p>
<a href="Dashboard_Koperasi/public/views/tb_daftar/" target="_blank" class="btn btn-outline-light rounded-pill border-2 py-3 px-5 animated slideInRight">DAFTAR MENJADI ANGGOTA</a>

                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid animated zoomIn" src="img/LOGO1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">About Us</div>
                        <h2 class="mb-4">Keunggulan Kami</h2>
                        <p class="mb-4">Hallo kesatria dan srikandi JNE, Mari Bersama-sama kita bangun masa depan yang lebih baik! Bergabunglah dengan koperasi kami dan jadilah bagian dari perubahan positif</p>
                        <div class="row g-3 mb-4">
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-user-tie text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Koperasi kami bukan hanya tempat untuk bisnis</h6>
                                    <span>Untuk membangun hubungan yang kuat dan saling mendukung. Bergabunglah dan jadilah bagian dari komunitas yang peduli.</span>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-chart-line text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Financial Analaysis</h6>
                                    <span>Dengan menganalisis data keuangan, seorang analis keuangan dapat membantu dalam perencanaan dan penyusunan anggaran. Hal ini membantu koperasi mengalokasikan sumber daya dengan efisien, mengidentifikasi peluang pertumbuhan, dan mengatasi potensi risiko keuangan.</span>
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-rocket text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h6>Waralaba kami bukan hanya bisnis</h6>
                                    <span>komunitas yang saling mendukung. Satu kesuksesan adalah milik kita bersama, setiap anggota adalah mitra dalam kesuksesan. Jadilah bagian dari perjalanan keberhasilan bersama.</span>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary my-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Ayo Mulai Bergabung</h3>
                        <!--<small class="text-white">Ingin mendapatkan informasi tentang kami.</small>-->
                        <!--<div class="position-relative w-100 mt-3">-->
                        <!--    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">-->
                        <!--    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="max-height: 250px;" src="img/newsletter.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


        <!-- Service Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Services</div>
                    <h2 class="mb-5">VALUE DAN PROGRAM</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Keberkahan</h5>
                                <span>Pinjaman tanpa Ribah.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-balance-scale fa-2x"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Berkeadilan</h5>
                                <span>Jual beli kredit/Murabah.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-hands-helping fa-2x"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Kebersamaan</h5>
                                <span>Usaha bersama/Musyarakah bantuan sosial.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-chart-area fa-2x"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Peduli</h5>
                                <span>Bantuan Sosial.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-chart-line"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Pemberdayaan</h5>
                                <span>Pembiayaan bagi hasil/Mudhorabah.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="fa fa-house-damage fa-2x"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">Pemasaran Bersama</h5>
                                <span>Koperasi dapat membantu anggotanya memasarkan produk atau jasa mereka secara bersama-sama, meningkatkan daya tawar dan mengurangi biaya pemasaran.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- Features Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Features</div>
                        <h2 class="mb-4">Mengapa Orang Memilih Kami?, </p>
                        <p>Ada beberapa alasan mengapa orang memilih untuk menjadi anggota atau bertransaksi dengan suatu koperasi</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                    <div class="col-lg-7">
                        <div class="row g-5">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-cubes text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Kesejahteraan Bersama</h6>
                                </div>
                                <span>Koperasi bertujuan untuk meningkatkan kesejahteraan bersama anggotanya. Keuntungan yang diperoleh dari operasi koperasi dapat dibagikan kembali kepada anggota.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-percent text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Partisipasi dalam Pengambilan Keputusan</h6>
                                </div>
                                <span>Anggota memiliki hak untuk berpartisipasi dalam pengambilan keputusan koperasi. Ini memberikan mereka kontrol langsung atas operasi koperasi dan memastikan kebijakan yang sesuai dengan kebutuhan mereka.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-award text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Akses ke Layanan dan Sumber Daya</h6>
                                </div>
                                <span>Koperasi dapat menyediakan akses anggota ke layanan atau sumber daya yang mungkin sulit atau mahal untuk diperoleh secara individu. Contohnya termasuk pelayanan kredit, pemasaran bersama, atau sumber daya lainnya.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-smile-beam text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Keberlanjutan Bisnis</h6>
                                </div>
                                <span>Koperasi dapat menjadi sarana untuk mendukung keberlanjutan bisnis anggota. Dengan bekerja sama dalam suatu koperasi, anggota dapat memperoleh keuntungan yang mungkin tidak bisa mereka dapatkan secara independen.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-user-tie text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Keamanan Ekonomi</h6>
                                </div>
                                <span>Koperasi sering kali memberikan keamanan ekonomi bagi anggotanya. Misalnya, dalam koperasi kredit, anggota dapat memperoleh pinjaman dengan suku bunga yang lebih rendah dibandingkan dengan lembaga keuangan lainnya.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.6s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                        <i class="fa fa-headset text-white"></i>
                                    </div>
                                    <h6 class="mb-0">Kerja Sama dan Kebersamaan</h6>
                                </div>
                                <span>Konsep kerja sama dan kebersamaan merupakan nilai inti koperasi. Orang sering memilih koperasi karena keinginan untuk bekerja sama dengan orang lain untuk mencapai tujuan bersama.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->


        <!-- Client Start -->
        <!--<div class="container-xxl bg-primary my-6 py-5 wow fadeInUp" data-wow-delay="0.1s">-->
        <!--    <div class="container">-->
        <!--        <div class="owl-carousel client-carousel">-->
        <!--            <a href="#"><img class="img-fluid" src="img/JNE.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/ASPERINDO.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/lazada.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/shopee.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/kas.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/it.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/topedd.png" alt=""></a>-->
        <!--            <a href="#"><img class="img-fluid" src="img/blibli.png" alt=""></a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Client End -->


        <!-- Testimonial Start -->
        <!--<div class="container-xxl py-6">-->
        <!--    <div class="container">-->
        <!--        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
        <!--            <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Testimonial</div>-->
        <!--            <h2 class="mb-5">What Our Clients Say!</h2>-->
        <!--        </div>-->
        <!--        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
        <!--            <div class="testimonial-item rounded p-4">-->
        <!--                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>-->
        <!--                <p>Informasi</p>-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h6 class="mb-1">Client Name</h6>-->
        <!--                        <small>Profession</small>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="testimonial-item rounded p-4">-->
        <!--                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>-->
        <!--                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h6 class="mb-1">Client Name</h6>-->
        <!--                        <small>Profession</small>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="testimonial-item rounded p-4">-->
        <!--                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>-->
        <!--                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h6 class="mb-1">Client Name</h6>-->
        <!--                        <small>Profession</small>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="testimonial-item rounded p-4">-->
        <!--                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>-->
        <!--                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>-->
        <!--                <div class="d-flex align-items-center">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h6 class="mb-1">Client Name</h6>-->
        <!--                        <small>Profession</small>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Testimonial End -->


        <!-- Team Start -->
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Team</div>
                    <h2 class="mb-5">Meet Our Team Members</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <h5>M YUSUF SAPUTRA</h5>
                            <p class="mb-4">Ketua Koperasi</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/team1.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item">
                            <h5>SHELLA OCTAMI</h5>
                            <p class="mb-4">Sekretaris Koperasi</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/team4.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item">
                            <h5>NURHASANAH</h5>
                            <p class="mb-4">Bendahara Koperasi</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/team2.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item">
                            <h5>M. ARIF</h5>
                            <p class="mb-4">Bidang Usaha Bersama</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/11.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item">
                            <h5>AZMI ARSYAD</h5>
                            <p class="mb-4">Bidang Pembiayaan</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/12.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item">
                            <h5>IBNU ZULQAWINATA</h5>
                            <p class="mb-4">Bidang Jual Beli Kredit</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/13.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item">
                            <h5>WAHYU WIJAYADI</h5>
                            <p class="mb-4">Bidang Usaha Bersama</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="img/14.jpg" alt="">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Lokasi kami</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Komp. ATC, Blok F19 Medan</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+62 823 8457 1175</p>
                        <!--<p><i class="fa fa-envelope me-3"></i>info@example.com</p>-->
                        <!--<div class="d-flex pt-2">-->
                        <!--    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>-->
                        <!--    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>-->
                        <!--    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>-->
                        <!--    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>-->
                        <!--    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>-->
                        <!--</div>-->
                    </div>
                    <!--<div class="col-md-6 col-lg-3">-->
                    <!--    <h5 class="text-white mb-4">Quick Link</h5>-->
                    <!--    <a class="btn btn-link" href="">About Us</a>-->
                    <!--    <a class="btn btn-link" href="">Contact Us</a>-->
                    <!--    <a class="btn btn-link" href="">Privacy Policy</a>-->
                    <!--    <a class="btn btn-link" href="">Terms & Condition</a>-->
                    <!--    <a class="btn btn-link" href="">Career</a>-->
                    <!--</div>-->
                    <!--<div class="col-md-6 col-lg-3">-->
                    <!--    <h5 class="text-white mb-4">Popular Link</h5>-->
                    <!--    <a class="btn btn-link" href="">About Us</a>-->
                    <!--    <a class="btn btn-link" href="">Contact Us</a>-->
                    <!--    <a class="btn btn-link" href="">Privacy Policy</a>-->
                    <!--    <a class="btn btn-link" href="">Terms & Condition</a>-->
                    <!--    <a class="btn btn-link" href="">Career</a>-->
                    <!--</div>-->
                    <!--<div class="col-md-6 col-lg-3">-->
                    <!--    <h5 class="text-white mb-4">Newsletter</h5>-->
                    <!--    <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>-->
                    <!--    <div class="position-relative w-100 mt-3">-->
                    <!--        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">-->
                    <!--        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>-->
                    <!--    </div>-->
                    <!--</div>-->
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


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
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