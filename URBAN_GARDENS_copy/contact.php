
<?php
//Model-Controller Area.  The PHP processing code goes in this area.
require_once('contactfunctions.php');

$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST);
$valid_form_submission = $form_submitted && !$honeypot_value;

if($valid_form_submission){
     
    $first_name = v_array('first_name', $_POST);
    $last_name = v_array('last_name', $_POST);
    $phone = v_array('phone', $_POST);
    $message = v_array('message', $_POST);
    $email = v_array('email', $_POST);
    $mail($email, 'Urban gardens', 'Thank you for contacting us we will get back to you as soon as we can !!!');

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  	.masthead {
  height: 100vh;
  min-height: 500px;
  background-image:url(images/main.jpg);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
#footer {
    background-image:url(images/soil1.png);
    
}
.banner {
    position: relative;
    background: url(images/rooftop.jpg)no-repeat center center;
    background-size: cover;
}
.message{
  height:50vh;
  width:50%;
  margin-top: 9%;
  margin-left: 25%;
  padding-top: 10%;
  padding-right: 10%;
  padding-left: 10%;
  font-family: ariel;
  background-color: #98d4a7;
  text-align: center;

}
#dont-you-do-it {
            display:none;

        }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.html">Urban gardens</a>
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
          <a class="nav-link" href="contact.php">Contact</a>
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

<div class="container-fluid banner ">
  <div class="">
  
    
        <div class="row">              
          
            <div>
            <h1 class="H1">
            </h1>
            </br>
            <h1 style="color:white;">Contact Us</h1>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!--end of header-->
<div>
 <?php if($valid_form_submission){ ?>

         <div class="message">
           <h2>Thank you <?=$first_name?>,<?=$last_name?></h2>
           <p>Thank you for contacting us we will get in tough as soon as we can</p>
           <p>Have a good day!!</p>
           
           </div>
        
        <?php } else{ ?>
</div>
<div class="row" id="contatti">
<div class="container mt-5" >

    <div class="row" style="height:550px;">
      <div class="col-md-6 maps" >
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="col-md-6">
        <h2 class="text-uppercase mt-3 font-weight-bold ">CONTACT US</h2>
        <!--start form-->
        <form method="post" action="contact.php">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" id="first_name" id="first_name" placeholder="First Name" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" id=
                "last_name" name="last_name" placeholder="Last Name" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="email" id="email" name="email" class="form-control mt-2" placeholder="Email" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" id="phone" name="phone" placeholder="Telephone number" required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" id="message" name="message" placeholder="Comments/Questions" rows="3" required></textarea>
              </div>
            </div>
            
          </br>
            <div class="col-12">
              <button class="btn btn-light" type="submit" name="submitted" id="button" value="submit">Submit</button>
            </div>
          </div>
        </form>
        <!--end Form-->
        <div>
        <h2 class="text-uppercase mt-4 font-weight-bold">Our phone number and location</h2>

        <i class="fas fa-phone mt-3"></i> <a href="tel:+">Telephone:(515)123-1234</a><br>
        <i class="fas fa-phone mt-3"></i> <a href="tel:+"> Fax: (515-123-7890)</a><br>
        <i class="fa fa-envelope mt-3"></i> <a href="">info@test.it</a><br>
        <i class="fas fa-globe mt-3"></i> Location: <br>
         101 des moines st
        <br>
        Des moines, Iowa
        <div class="my-4">
        <a href=""><i class="fab fa-facebook fa-3x pr-4"></i></a>
        <a href=""><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
        </div>
      </div>

    </div>
</div>
</div>


<script src="https://kit.fontawesome.com/a076d05399.js"></script></br>
<h1 class="h1"> Check us out on social media</h1>
<div class="social-icons">

      <i class='fab fa-twitter'></i>
      <i class='fab fa-instagram'></i>
     
    </div>



<?php } ?>







<!--footer-->
<img src="images/grass.png" alt="grass clipart"style="width:100%; height:400px; margin-bottom:-40px ">
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
    
      </div>  
      
        </hr>
      </div>  
    </div>
  </section>


</body>
</html>