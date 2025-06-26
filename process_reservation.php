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

  <title>Reservation | Yukon Cinemas</title>
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
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST["movie"];
    $cinema_id = $_POST["cinema"];
    $reservation_date = $_POST["reservation_date"];
    $time = $_POST["time"];
    
        
    

    // Get movie name based on movie_id
    $movie_name = getMovieName($movie_id);

    // Get cinema name based on cinema_id
    $cinema_name = getCinemaName($cinema_id);

    // Fetch cinema details
    $cinemaDetails = getCinemaDetails($cinema_name);
    
   

    if ($cinemaDetails) {
        $numRows = $cinemaDetails['c_row'];
        $numCols = $cinemaDetails['c_cols'];

        // Display the available seats interface
        echo "<div style='text-align: center;'>";
        echo "<h2 style='text-align:center'>Available Seats <br> $movie_name <br>At $cinema_name</h2>";

        // Display the reservation details
        echo "<p>Reservation Date: $reservation_date</p>";
        echo "<p>Time: $time</p>";

        echo "<form method='post' action='confirm_reservation.php'>";
        $seatLayout = getSeatLayout($numRows, $numCols, $reservation_date, $time, $cinema_name);

        if ($seatLayout) {
            foreach ($seatLayout as $row => $columns) {
                foreach ($columns as $column => $status) {
                    $seatNumber = $row * $numCols + $column + 1;

                  if (isset($_SESSION['status']) && $_SESSION['status'] == 'reserved'){
  
                        echo "<input type='checkbox' name='seat[]' value='$seatNumber' disabled  style='width: 25px; height: 25px; margin: 5px; background-color: red;'> $seatNumber   ";
                    } else {
                        echo "<input type='checkbox' name='seat[]' value='$seatNumber'  style='width: 25px; height: 25px; margin: 5px; background-color: green;'> $seatNumber ";
                    }
                }
                echo "<br>";
            }

            // Include hidden fields for reservation details
            echo "<input type='hidden' name='movie_id' value='$movie_id'>";
            echo "<input type='hidden' name='cinema_id' value='$cinema_id'>";
            echo "<input type='hidden' name='reservation_date' value='$reservation_date'>";
            echo "<input type='hidden' name='time' value='$time'>";

            echo "<br><input type='submit' value='Reserve' style='margin:5px auto; display:block;'>";
            echo "</form>";
        } else {
            echo "Error fetching seat layout.";
            // Handle the error as needed
        }
        echo "</div>";
    } else {
        echo "Error fetching cinema details.";
        // Handle the error as needed
    }
}

function getMovieName($movie_id) {
    global $conn;

    $sql = "SELECT m_name FROM movies WHERE m_id = '$movie_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["m_name"];
    } else {
        return "Movie not found";
    }
}

function getCinemaName($cinema_id) {
    global $conn;

    $sql = "SELECT c_name FROM cinemas WHERE c_id = '$cinema_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["c_name"];
    } else {
        return "Cinema not found";
    }
}

function getCinemaDetails($cinema_name) {
    global $conn;

    $sql = "SELECT c_row, c_cols FROM cinemas WHERE c_name = '$cinema_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false; // Cinema not found
    }
}

function getSeatLayout($numRows, $numCols, $reservation_date, $time, $cinema_name) {
    global $conn;

    $sql = "SELECT * FROM reservations WHERE reservation_date = '$reservation_date' AND reservation_time = '$time' AND cinema_id = '$cinema_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $seatLayout = array_fill(1, $numRows, array_fill(1, $numCols, 'available'));

        while ($row = $result->fetch_assoc()) {
            $seatNumber = $row["seat_number"];
            $rowNumber = ceil($seatNumber / $numCols);
            $colNumber = ($seatNumber - 1) % $numCols + 1;

            $seatLayout[$rowNumber][$colNumber] = 'reserved';
        }

        return $seatLayout;
    } else {
        return array_fill(1, $numRows, array_fill(1, $numCols, 'available'));
    }
}

?>
<br><br><br>
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