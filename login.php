<!-- =======================================================
  * Author: Konstantopoulos Thanasis 
  ======================================================== -->

<?php
$is_invalid = false ;
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'" ,
            $mysqli-> real_escape_string ($_POST["email"]));
    $result = $mysqli-> query($sql);
    $user = $result->fetch_assoc();
    
   
    
    if ($user){
        if (password_verify($_POST["password"], $user["password_hash"],))
        {
session_start();
session_regenerate_id();

$_SESSION["user_id"] = $user["id"];
$_SESSION["userType"]= $user["userType"];
header("Location: Yukon_Home.php");
exit;

        }
    }
    $is_invalid = true;
}
 
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login To Yukon | Yukon Cinemas</title>
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
    
   <section id="contact" class="contact">
      <div class="container">
 <div class="row justify-content-center mt-4">
     <h1 style="color:white;">Login<br><br><br><br><br></h1>
 <div class="row justify-content-center mt-4">
     <?php
     if ($is_invalid): ?>
     <em>Invalid login</em>
     <?php endif;?>

         <div class="col-lg-9">
            <form  method="post" role="form" class="php-email-form" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "")?>" placeholder="Your Email" >
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
              </div>
               
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Sign In</button></div>
            
            </form>
               <a  style="text-align: center" href="Yukon_SignUp.html">Sign Up</a>
                  <br>
             <a  style="text-align: center" href="Yukon_Home.html">Home</a> 
          </div><!-- End Contact Form -->

        </div>
        </div>
 

 </div>
   </section><!-- End Contact Section --><br><br><br><br><br><br><br><br><br><br>
<footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>YUKON</span></strong>. All Rights Reserved
		 <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
      </div>
      	
    </div>
  </footer>

 
  
</body>

</html>