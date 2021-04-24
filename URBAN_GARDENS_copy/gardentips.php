

<?php
require_once('dbconnect.php');
require 'functions.php';
$tips = get_tips(); 

$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$query = 'SELECT *';
$query .= 'FROM ugardens';
$queryOBj = $conn->query($query);

$results = $queryOBj->fetchAll();

//echo '<pre>'; print_r($results); echo '</pre>';


?>

?><!DOCTYPE HTML>
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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

.card::after {
    display: block;
    position: absolute;
    bottom: -10px;
    left: 20px;
    width: calc(100% - 40px);
    height: 35px;
    background-color: #fff;
    -webkit-box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
    box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
    content: '';
    z-index: -1;
}
a.card {
    text-decoration: none;
}

.card {
    position: relative;
    border: 0;
    border-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,0.125);
    border-radius: .25rem;
}

.box-shadow {
    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
}

.ml-auto, .mx-auto {
    margin-left: auto !important;
}
.mr-auto, .mx-auto {
    margin-right: auto !important;
}
.rounded-circle {
    border-radius: 50% !important;
}
.bg-white {
    background-color: #fff !important;
}

.ml-auto, .mx-auto {
    margin-left: auto !important;
}

.mr-auto, .mx-auto {
    margin-right: auto !important;
}
.d-block {
    display: block !important;
}
img, figure {
    max-width: 100%;
    height: auto;
    vertical-align: middle;
}

.card-text {
    padding-top: 12px;
    color: #8c8c8c;
}

.text-sm {
    font-size: 12px !important;
}
p, .p {
    margin: 0 0 16px;
}

.card-title {
    margin: 0;
    font-family: "Montserrat",sans-serif;
    font-size: 18px;
    font-weight: 900;
}

.pt-1, .py-1 {
    padding-top: .25rem !important;


}

.head-icon{
    margin-top:18px;
    color:green;
}
.jumbotron{
  background-color: #a1c79f;
}
</style>

</head>
<body>
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
          <a class="nav-link" href="contact.html">Contact us</a>
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

<!-- Full Page Image Header with Vertically Centered Content -->
<center>
<div class="jumbotron">
  <h1> Garden tips</h1>
</div>
<!--end of jumbo tron-->


<section class="container pt-3 mb-3">
  <h1> 
 <?=$queryOBj->rowCount()?> Tips are given
</h1>
    <h2 class="h3 block-title text-center">We know a thing or to about gardens but we always love to know more and teach each othr new things about gardening. Here are a few tips that will help you out a bit more!</h2>


    <?php foreach($tips as $tips) {//loop through events ?>
   <div class="row pt-5 mt-30">
        <div class="col-lg-12 col-sm-6 mb-30 pb-5">
            <a class="card" href="#">
                <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="fa fa-user fa-3x head-icon"></i></div>
                <div class="card-body text-center">
                    <h3 class="card-title pt-1"> <?=$tips['title']//title?></h3>
                    <p class="card-text text-sm"><?=$tips['description']//=event name?></p><span class="text-sm text-uppercase font-weight-bold"><?=$tips['author']//=event name?></span>
                    <p> Date posted: <?=$tips['date']?> ,<?=$tips['time']?>
                        <i class="fe-icon-arrow-right"></i></span>
                </div>
            </a>
        </div>
        
        
    </div>
     <?php }//close event loop ?>
</section>
</center>
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



</body>
</html>