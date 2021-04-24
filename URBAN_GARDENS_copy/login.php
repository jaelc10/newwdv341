<?php 
require_once('functions.php');
session_start();
//print_r($_POST);
// Check if user is already logged in to skip the login form
if($logged_in = is_logged_in()) {
    header('Location: in_tip.php');
} else {
    // Check if the user submitted the login form
    if(v_array('submit', $_POST)) {
        $username = v_array('username', $_POST);
        $password = v_array('password', $_POST);
        echo $username;
        echo $password;
        $logged_in = log_in($username, $password);

        // Send the logged in user to the index page
        if($logged_in) {
            header('Location: in_tip.php');
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet"  type="text/css" href="css/style.css">
  <link rel="stylesheet"  type="text/css" href="scss/style.scss">
  <link rel="stylesheet"  type="text/css" href="css/UG.css">
  <link rel="stylesheet"  type="text/css" href="scss/UG.scss">
  <link rel="stylesheet"  type="text/css" href="css/login.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
  	.masthead {
  height: 100vh;
  min-height: 500px;
  background-image:url(images/front.jpg);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
#footer {
    background-image:url(images/soil1.png);
    
}
.login-block{
  background: #DE6262;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to bottom, #cbf5d6, #80a88a); 
  background: linear-gradient(to bottom,  #cbf5d6, #80a88a);

  font-family: ariel;
  text-align: center;
}
.center{
  text-align: center;
 
}
</style>

</head>
<body>

  <!--start Nav-->
<nav class="navbar navbar-expand-lg navbar shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.html">URBAN GARDENS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.html">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gardentips.php">Garden tips</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!--end of nav-->


<section class="simple-login-container">
<!-- Page Content -->
<!--start admin login-->
<div>
    <h2>Admin login</h2>
    <form action="login.php" method="post">
    <div class="row">
        <div class="col-md-12 form-group">
          <label for="username">Username</label><br>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter you Username" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
          <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-block btn-login" placeholder="Enter your Password">
        </div>
    </div>
  </form>
    
</div>
<!--end admin login-->
</section>

<!--end of page content-->
<img src="images/grass.png" alt="grass clipart"style="width:100%; height:400px; margin-bottom: -30px;">
</section>
<!--footer-->
<section id="footer">
    <div class="container">
       <h1 style="text-align: center; color:orange;">CONTACT US AT: (515)123-1234</h1>
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-xs-12 col-sm-4 col-md-4">
          
          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About us</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Services</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Portfolio</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contact us</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>ACADEMIC PROJECT</h5>
          
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Located in:<br>
             123 Des moines st<br>
          Des moines, iowa</h5>

          
        </div>
       
      <div class="col-xs-12 col-sm-4 col-md-4">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script></br>


        </hr>
      </div>  
    </div>
  </section>

<!--end of footer-->

</body>
</html>