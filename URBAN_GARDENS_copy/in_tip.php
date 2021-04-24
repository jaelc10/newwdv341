<?php

require_once('functions.php');
session_start();

$logout = v_array('logout', $_POST);

// If the user is not logged in, then sent them back to the login page
if($logout || !is_logged_in()) {
    if($logout) {
        log_out();
    }

    header('Location: login.php');

}
?>

<?php
require_once('dbconnect.php');
include_once 'functions.php';
include 'validating.php';


$tips = get_tips(); 

$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$query = 'SELECT *';
$query .= 'FROM ugardens';
$queryOBj = $conn->query($query);

$results = $queryOBj->fetchAll();

//echo '<pre>'; print_r($results); echo '</pre>';




$valid_form = true;
$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST);
$result = v_array('result', $_GET);
$title = '';
$author = '';
$description = '';
$date = '';
$time = '';
//errors
$error_title = '';
$error_author = '';
$error_description = '';
$error_date = '';
$error_time = '';
//end errors
$valid_form_submission = $form_submitted && !$honeypot_value;

if($valid_form_submission){

$title = v_array('title', $_POST);
$author = v_array('author', $_POST);
$description = v_array('description', $_POST);
$date = v_array('date', $_POST);
$time = v_array('time', $_POST);
   

  
if(!valid_title($title)) {
        $valid_form = false;
        $error_title = '* Please enter an event name';
    }

    if(!valid_description($description)){
        $valid_form = false;
        $error_description = '* Please give an event description';
    }

    if(!valid_author($author)){
        $valid_form = false;
        $error_author = '* Please give an event presenter';
    }


    if(!valid_date($date)){
        $valid_form = false;
        $error_date = '* Please give an event date';
    }

    if(!valid_time($time)){
        $valid_form = false;
        $error_time = 'Please give an event time';
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
#dont-you-do-it {
            display:none;
        }

    .error{
            color: red;
        }
.jumbotron{
  background-color: #a1c79f;
}

 form {
        font-family: sans-serif;
        width: 100%;
        max-width: 700px;
        background-color: #88b886;
       
        border: dashed 3px lightgray;
        padding: 40px;
        margin-top:80px;
        border-radius: 15px;
        color: white;
        margin-bottom: 20%;

    }
    If transporting plants, do so after a rainfall
Damp soil will keep the roots from cracking.

    .display form .buttons {
        display: flex;
        flex-direction: row;
    }

    .display form p {
        display: flex;
        flex-direction: column;
    }

    .display form p label {
        padding: 5px 0;
    }

    .display form p input,
    .display form p textarea {
        padding: 7px;
        background: none;
        border: 1px solid white;
        border-radius: 5px;
        color: white;
    }

    .display form p input[type="submit"],
    .display form p input[type="reset"] {
        background: white;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
        curs
</style>
<script>
    function resetForm(myFormId)
   {
       var myForm = document.getElementById(myFormId);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }

    </script>

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
  <h1> You're logged in!</h1>
</div>
<header>
  
</header>
<section class="container pt-3 mb-3">
 
   <div>
    <h2 class="h3 block-title text-center">Hey, your logged in go ahead an make changes to an event or upload a new one!</h2>
  </div>
  <form action="in_tip.php" method="post">
        <input type="submit" name="logout" id="logout" value="Logout" />
    </form>
        <div>
    <?php if($valid_form_submission){ ?>
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event was added</p>
        </div>
         <?php } ?> 
        <?php if(!$valid_form_submission) { ?>  
        <form  id="myFormId" name="form1" method="post" action="in_tip.php" enctype="multipart/form-data">
 

            <h2>Event Input Form</h2>
            <p>Submit a new event to WDV341 Events:</p>
            <p>
                
            <p>
                <span id="error_title" class="error"><?=$error_title?></span>
                <label for="title">Name of Garden tip:</label>
                <input type="text" name="title" id="title" value="<?=$title ? $title : ''?>">
            </p>

             <p>
                <span id="error_author" class="error"><?=$error_author?></span>
                <label for="author">Name of the author:</label>
                <input type="text" name="author" id="author" value="<?=$author ? $author : ''?>">
               
                
            </p>

            <p>
                <span id="error_date" class="error"><?=$error_date?></span>
            <label for="date">Tip added in :</label>
             <input type="date" name="date" id="date" value="<?=$date ? $date : ''?>">
            </p>


            <p>
            <span id="error_time" class="error"><?=$error_time?></span>
            <label for="time">Tip added at:</label>
            <input type="time" name="dont_you_do_it" id="dont-you-do-it" value=""/>
             <input type="text" name="time" id="time" value="<?=$time ? $time : ''?>">
            </p>
            <p>
                <span id="error_description" class="error"><?=$error_description?></span>
                <label for="description">Tip Description:</label>
                <input name="description" id="description" value="<?=$description ? $description : ''?>"/>
            </p>
            <p>
               
            </p>
            <p class="buttons">
                <input type="submit" name="submitted" id="event_submit" value="Submit">
                <input name="reset" type="reset" onclick="resetForm('myFormId'); return false;" />
            </p>


        </form>
        <!--end of form-->
        <!--start foreachloop Tips-->
         <?php } ?>
          <div class="output">
        <?php 
                if($result = v_array('result', $_GET)) {
                    echo $result == 'success'
                        ? '<p class="success">Event added successfully!</p>'
                        : '<p class="error">There was a problem adding your Event, please try again.</p>';
                }
            ?>
 

        
        
        <div>
<h1><?=$queryOBj->rowCount()?> Tips are given</h1>
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
        
        <?php }//close event loop ?>
    </div>
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