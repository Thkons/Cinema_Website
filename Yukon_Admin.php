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

  <title>YUKON - Cinema | Top Latest Movies</title>
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
   

     
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500" style="background: radial-gradient(circle at center top, rgb(103, 55, 40) 0px, rgb(5, 17, 34) 900px, rgb(5, 17, 34));overflow: unset;">
    <div class="container">
      <div class="row justify-content-center">
       
      </div>
    </div>
  </section><!-- End Hero Section -->
  
  
   <div class="container">
        <div class="row justify-content-center mt-4">

         
<?php
if (isset ($_GET['msg'])){
    if($_GET['msg']=="1"){
        echo "<p>New Cinema inserted successfully!</p>";
    }
    if($_GET['msg']=="2"){
        echo "<p>Record updated successfully!</p>";
    }
    if($_GET['msg']=="3"){
        echo "<p>Record deleted successfully!</p>";
    }
    if($_GET['msg']=="4"){
        echo "<p>New Movie inserted successfully!</p>";
    }
}
?>
 <div class="col-lg-9">
              <div class="form-group mt-3">
                
              </div>

<?php
if(isset($_GET['r_name'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO cinemas (c_name, c_row, c_cols, location, city)
VALUES ('$_GET[r_name]', '$_GET[row]', '$_GET[col]', '$_GET[location]', '$_GET[city]')";
if ($conn->query($sql) === TRUE) {
    header('Location:Yukon_Admin.php?msg=1');
   // echo "New room created successfully";
} else {    echo "Error: " . $sql . "<br>" . $conn->error; } $conn->close(); 
}
echo " <section class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>Insert New Cinema</h2>";
echo "<form ";
echo "<div class='form-group mt-3'>";
echo "<input  class='form-control' type=text name=r_name placeholder='Cinema Name:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=number name=row placeholder='Cinema Rows:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=number name=col placeholder='Cinema Columns:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=location placeholder='Cinema Location:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=city placeholder='Cinema City:'></div>";
echo "<div class='form-group mt-3'>";
echo "<div class='text-center'><input type=submit name=SAVE></div></div></div></div></div></form></section>";


if(isset($_GET['m_name'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO movies (m_name, Director, Type, Popularity, Rating, Duration, Cast, Synopsis)
VALUES ('$_GET[m_name]', '$_GET[Director]', '$_GET[Type]', '$_GET[Popularity]', '$_GET[Rating]', '$_GET[Duration]', '$_GET[Cast]', '$_GET[Synopsis]')";
if ($conn->query($sql) === TRUE) {
   // echo "New room created successfully";
} else {    echo "Error: " . $sql . "<br>" . $conn->error; } $conn->close(); 
}

echo " <section class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>Insert New Movie</h2>";
echo "<form ";
echo "<div class='form-group mt-3'>";
echo "<input  class='form-control' type=text name=m_name placeholder='Movie Name:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Director placeholder='Movie Director:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Type placeholder='Movie Type:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=number name=Popularity placeholder='Movie Popularity:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Rating placeholder='Movie Rating:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Duration placeholder='Movie Duration:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Cast placeholder='Movie Cast:'></div>";
echo "<div class='form-group mt-3'>";
echo "<input class='form-control' type=text name=Synopsis placeholder='Movie Synopsis:'></div>";
echo "<div class='form-group mt-3'>";
echo "<div class='text-center'><input type=submit name=SAVE></div></div></div></div></div></form></section>";




//select all users
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM user";
$sql1= "SELECT * FROM reservations";
$sql2= "SELECT * FROM movies";
$sql3= "SELECT * FROM cinemas";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
if ($result->num_rows > 0) {
     echo " <section id='contact' class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>User List</h2>";
    echo "<table>";
   
        while($row = $result->fetch_assoc()) 
                
                {
   
        echo "<tr><form  action=update.php method=GET>";
        echo "<div class='form-group mt-3'>";
        echo "<td>id: ". $row["id"]."<input class='form-control' type=hidden name=id value=". $row["id"]."></td></div>";
        echo "<td><input class='form-control' type=text name=name value=" . $row["name"]. "></td>";
        echo "<td>Email:</td><td><input class='form-control' type=email name=email value=" . $row["email"]. "></td>";
        echo "<td>User Type:</td><td><input class='form-control' type=text name=userType value=" . $row["userType"]. "></td>";
        echo "<td><div class='text-center'><td><input type=submit value=Update></div></td>";
        echo "<td><div class='text-center'><a href=delete.php?id=". $row["id"].">&nbsp;DELETE</a></div></td></form></tr>";
   
                    } 
                    
    echo "</table></div></div></div></section>";
                } else {     echo "0 results"; } 
                
                if ($result1->num_rows > 0) {
     echo " <section id='contact' class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>Reservation List</h2>";
    echo "<table>";
   
        while($row = $result1->fetch_assoc()) 
                
                {
   
        echo "<tr><form  action=update1.php method=GET>";
        echo "<div class='form-group mt-3'>";
        echo "<td>Res_id:<br> ". $row["res_id"]."<input class='form-control' type=hidden name=res_id value=". $row["res_id"]."></td></div>";
        echo "<td>&nbsp;Seat_Number:<br> <input class='form-control' type=number name=seat_number value=" . $row["seat_number"]. "></td>";
        echo "<td>&nbsp;Res_Date:<br> <input class='form-control' type=date name=reservation_date value=". $row["reservation_date"]."></td>";
        echo "<td>&nbsp;Res_Time:<br> <input class='form-control' type=text name=reservation_time value=". $row["reservation_time"]."></td>";
        echo "<td>&nbsp;Movie_id:<br> ". $row["movie_id"]."<input class='form-control' type=hidden name=movie_id value=". $row["movie_id"]."></td>";
        echo "<td>&nbsp;Cinema_id:<br> ". $row["cinema_id"]."<input class='form-control' type=hidden name=cinema_id value=". $row["cinema_id"]."></td>";
        echo "<td>&nbsp;User Name:<br> ". $row["user_name"]."<input class='form-control' type=hidden name=user_name value=" . $row["user_name"]. "></td>";
        echo "<td>&nbsp;User Email:<br> ". $row["user_email"]."<input class='form-control' type=hidden name=user_email value=" . $row["user_email"]. "></td>";
        echo "<td><div class='text-center'><td><input type=submit value=Update></div></td>";
        echo "<td><div class='text-center'><a href=delete1.php?res_id=". $row["res_id"].">&nbsp;DELETE</a></div></td></form></tr>";
   
                    } 
                    
    echo "</table></div></div></div></section>";
                } else {     echo "0 results"; } 
                
                if ($result2->num_rows > 0) {
     echo " <section id='contact' class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>Movie List</h2>";
    echo "<table>";
   
        while($row = $result2->fetch_assoc()) 
                
                {
   
        echo "<tr><form  action=update.php method=GET>";
        echo "<div class='form-group mt-3'>";
        echo "<td>M_id: ". $row["m_id"]."<input class='form-control' type=hidden name=m_id value=". $row["m_id"]."></td></div>";
        echo "<td>M_name: ". $row["m_name"]."<input class='form-control' type=hidden name=m_name value=" . $row["m_name"]. "></td>";
        echo "<td><div class='text-center'><a href=delete2.php?m_id=". $row["m_id"].">&nbsp;DELETE</a></div></td></form></tr>";
        
   
                    } 
                    
    echo "</table></div></div></div></section>";
                } else {     echo "0 results"; } 
                
                
                 if ($result3->num_rows > 0) {
     echo " <section id='contact' class='contact'>
      <div class='container'><div class='row justify-content-center mt-4'><div class='col-lg-15' id=pl1><h2>Cinema List</h2>";
    echo "<table>";
   
        while($row = $result3->fetch_assoc()) 
                
                {
   
        echo "<tr><form  action=update.php method=GET>";
        echo "<div class='form-group mt-3'>";
        echo "<td>C_id: ". $row["c_id"]."<input class='form-control' type=hidden name=c_id value=". $row["c_id"]."></td></div>";
        echo "<td>C_name: ". $row["c_name"]."<input class='form-control' type=hidden name=c_name value=" . $row["c_name"]. "></td>";
        echo "<td>C_rows: ". $row["c_row"]."<input class='form-control' type=hidden name=c_row value=" . $row["c_row"]. "></td>";
        echo "<td>&nbsp;C_columns: ". $row["c_cols"]."<input class='form-control' type=hidden name=c_cols value=" . $row["c_cols"]. "></td>";
        echo "<td><div class='text-center'><a href=delete3.php?c_id=". $row["c_id"].">&nbsp;DELETE</a></div></td></form></tr>";
        
   
                    } 
                    
    echo "</table></div></div></div></section>";
                } else {     echo "0 results"; } 
                

                
                
                
                
                $conn->close();
                
                    
                
                
                
                

                
                
                
//end selection

?>
       </div>   </div>   
   </div>
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