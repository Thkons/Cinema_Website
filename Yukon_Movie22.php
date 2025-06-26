<?php

session_start();
if (isset($_SESSION["user_id"]))
{
    $mysqli = require __DIR__ . "/database.php";
        $sql = "SELECT * FROM user WHERE id={$_SESSION["user_id"]}";
            
$result = $mysqli-> query ($sql);
    $user = $result-> fetch_assoc();
                
}
 if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == '5'){
    $mysqli = require __DIR__ . "/database.php";
        $sql = "SELECT * FROM user WHERE id='5'";
            
$result = $mysqli-> query ($sql);
    $user_admin = $result-> fetch_assoc();
}

?> 

<!-- =======================================================
  * Author: Konstantopoulos Thanasis 
  ======================================================== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lord of War | Coming Soon | Yukon Cinemas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

 
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body style="background: radial-gradient(circle at center top, rgb(103, 55, 40) 0px, rgb(5, 17, 34) 900px, rgb(5, 17, 34));overflow: unset;">

 
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="Yukon_Home.php" class="logo d-flex align-items-center  me-auto me-lg-0">
         <h1 style="font-size:40px; letter-spacing: .5px; line-height: 24px; color:white; margin:10px;">YUKON</h1>
        
      </a>

      <nav id="navbar" class="navbar">
        <ul>
		
		<li><a href="Yukon_Home.php">Top Films</a></li>
		<li class="dropdown"><a href="#" ><span>Films</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            
              <ul>
              <li ><a href="Yukon_AllFilms.php">All Films</a></li>
              <li><a href="Yukon_NowShowing.php">Now Showing</a></li>
              <li><a href="Yukon_ComingSoon.php">Coming Soon</a></li>
                </ul>
              </li>
        
       
		  <li><a href="Yukon_Cinemas.php" >Cinemas</a></li>
         
          <li><a href="Yukon_Offers&Gifts.php">Offers & Gifts</a></li>
          <li><a href="Yukon_Contact.php">Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
          <?php 
              if (isset($user)): ?>
    	<li class="dropdown"><a href="#" ><span>Hello <?= htmlspecialchars($user["name"]) ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              
              <li><a href="logout.php">Log Out</a></li>
              <?php
              if (isset($user_admin)): ?>
               <li><a href="Yukon_Admin.php">Admin Page</a></li>
                               <?php endif; ?> 
            
            </ul>
		<?php endif; ?>
                                 
                                 
		
		</ul>
           
		</nav>
   

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade" data-aos-delay="1500">



  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/gallery/gallery-100.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-5 content">
		      <h2>Lord of War</h2>
            
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Director:</strong> <span>Andrew Niccol</span></li>
                
                  <li><i class="bi bi-chevron-right"></i> <strong>Popularity:</strong> <span>3.133</span></li>
				                    <li><i class="bi bi-chevron-right"></i> <strong>Duration:</strong> <span>2h 2m</span></li>

                 
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Type:</strong> <span>Crime</span></li>
				  <li><i class="bi bi-chevron-right"></i> <strong>Rating:</strong> <span>R</span></li>
				  <li><i class="bi bi-chevron-right"></i> <strong>Release Date:</strong> <span>09/10/2005</span></li>
                </ul>
              </div>
            </div>
			
            <p class="py-3">
			<h4>Cast</h4>
    Nicolas Cage, Ethan Hawke, Jared Leto

            </p>
            <p class="m-0">
			<h4>Synopsis</h4>
An arms dealer confronts the morality of his work as he is being chased by an INTERPOL Agent.     </p>
<p class="m-0">
			Soon With Us    </p>
          </div>
        </div>

      </div>
	  
    </section><!-- End About Section -->

   

  </main><!-- End #main -->

  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>YUKON</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

 
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

 
  <script src="assets/js/main.js"></script>

</body>

</html>