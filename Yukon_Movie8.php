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

  <title>Gully | Top Latest Movies</title>
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
            <img src="assets/img/gallery/gallery-9.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-5 content">
            <h2>Gully</h2>
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Director:</strong> <span>Nabil Elderkin</span></li>
                
                  <li><i class="bi bi-chevron-right"></i> <strong>Popularity:</strong> <span>20</span></li>
				                    <li><i class="bi bi-chevron-right"></i> <strong>Duration:</strong> <span>1h 24m</span></li>

                 
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Type:</strong> <span>Crime</span></li>
				  <li><i class="bi bi-chevron-right"></i> <strong>Rating:</strong> <span>R</span></li>
                </ul>
              </div>
            </div>
			
            <p class="py-3">
			<h4>Cast</h4>
                Kelvin Harrison Jr., Jacob Latimore, Charlie Plummer


            </p>
            <p class="m-0">
			<h4>Synopsis</h4>
It follows three disaffected teens through the underbelly of Los Angeles as they navigate the challenges of being marginalized youth in an unforgiving America. When a dark secret is revealed, their friendship may be their only salvation.            </p>
          </div>
        </div>

      </div>
	   <section id="contact" class="contact">
      <div class="container">


  <div class="row justify-content-center mt-4">

          <div class="col-lg-9">
		   
            
              
        
        <h2>Booking</h2>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch movies from the database
$movies = getMovies();

// Fetch cinemas from the database
$cinemas = getCinemas();

function getMovies() {
    global $conn; // Assuming $conn is your database connection

    $sql = "SELECT m_id, m_name FROM movies WHERE m_id=9";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    $movies = array();
    while ($row = $result->fetch_assoc()) {
        $movies[$row["m_id"]] = $row["m_name"];
    }

    return $movies;
}

function getCinemas() {
    global $conn; // Assuming $conn is your database connection

    $sql = "SELECT c_id, c_name FROM cinemas";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    $cinemas = array();
    while ($row = $result->fetch_assoc()) {
        $cinemas[$row["c_id"]] = $row["c_name"];
    }

    return $cinemas;
}
?>

<!-- HTML form with dynamic movie and cinema options -->
<form method="post" action="process_reservation.php">
    Movie:
    <select name="movie">
        <?php
        foreach ($movies as $m_id => $m_name) {
            echo "<option value='$m_id'>$m_name</option>";
        }
        ?>
    </select><br><br>

    Cinema:
    <select name="cinema">
        <?php
        foreach ($cinemas as $c_id => $c_name) {
            echo "<option value='$c_id'>$c_name</option>";
        }
        ?>
    </select><br><br>

    Date:
    <input type="date" name="reservation_date" required><br><br>

    Time:
    <select name="time">
        <option value="First">First</option>
        <option value="Second">Second</option>
       
        
      </select><br><br>

    <input type="submit" value="Check Availability">
</form>
        
    
                 

     </div>
  </div>
    </section>
    </section><!-- End About Section -->

   <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-header">
          <h2>So Far</h2>
          <p>Reviews</p>
        </div>

        <div class="slides-3 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                 I love beautiful movies. If a film is eye-candy with carefully designed decorations, masterful camerawork, lighting, and architectural frames, I can forgive anything else in the movie. The lack or even absence of logic, weak dialogue and characters, cliche storylines–I can live with all that if I like what I see. 
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Mr. Pink</h3>
                  <h4>Reviewer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
Before starting to review one of the greatest–in my opinion–TV shows of all time, let me put some suspense and psychological pressure on you first.

                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>The Wolf</h3>
                  <h4>Reviewer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
Skeptics like to debate whether humanity’s way of entertainment has changed throughout recent centuries or not. Some claim that it never did, and just as a thousand years ago, people still like shows and thrills.                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Darth Shatner</h3>
                  <h4>Reviewer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
Unfortunately, dystopia has become a popular genre recently; I say “unfortunately,” because for some reason unknown to me, the style, storylines, and characters in modern dystopian novels and movies are simplified, flat, and one-dimensional.                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Larry Talbot</h3>
                  <h4>Reviewer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
When something becomes ubiquitous, it tends to lose its uniqueness and complexity. I believe this is some sort of universal law opposite to the famous “quantity into quality” principle–and, unfortunately, equally valid and effective.                 </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Glenn Strange</h3>
                  <h4>Reviewer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

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