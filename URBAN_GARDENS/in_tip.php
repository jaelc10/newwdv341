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

Require_once 'functions.php';
include 'validating.php';





// echo '<pre>'; print_r($results); echo '</pre>';

$valid_form = true;
$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST);

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
        $error_title = '* Please give Your garden tip a name';
    }

    if(!valid_description($description)){
        $valid_form = false;
        $error_description = '* Please give your garden tip a description';
    }

    if(!valid_author($author)){
        $valid_form = false;
        $error_author = '* Please give your garden tip a author';
    }


    if(!valid_date($date)){
        $valid_form = false;
        $error_date = '* Please give your garden tip a date';
    }

    if(!valid_time($time)){
        $valid_form = false;
        $error_time = '* Please give your garden tip a time';
    }

}
$Tips = get_tips(); 
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
   <link rel="stylesheet"  type="text/css" href="css/tipStyle.css">
  
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
.jumbotron{
    background-color: #a1c79f;
        }

</style>
<script>
        function deleteEventCheck(tipid,tiptitle) {
            const deleteEvent = confirm('Are you sure you want to delete this event?');

            if(deleteEvent) {
                window.location = 'delete_tip.php?id=' + tipid + '&title=' + tiptitle;
            }
        }
    </script>
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
  <!-- start of body -->
 
<!-- start of nav -->
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
          <a class="nav-link" href="in_tip.php">log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- end of nav -->
<!-- Full Page Image Header with Vertically Centered Content -->

<center>
  <!-- start header -->
  <header>
  <div class="jumbotron">
  <h1> You're logged in!</h1>
  </div>
</header>

<!-- end of header -->
<section class="container pt-3 mb-3">
   <div><h1>Admin side</h1>
    <p> Welcome back, go ahead an add event or delete your event</p>
     
  </div>

  <div> 
  <form action="in_tip.php" method="post" >
        <input type="submit" name="logout" id="logout" value="Logout" style="background-color: green; margin-bottom: 20px;" />
    </form>
      <div class="output">
        <?php if($form_submitted && $valid_form){ ?>
        
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event called: <?=$title?></p>
            <p>Was added thank you!</p>
        </div>
        <?php } elseif($form_submitted) { ?>
        <div>
            <h2>Uh Oh!</h2>
            <p>There was a problem please see the errors Below!</p>
        </div>

        </div>
         <?php } ?>
         <?php
     if($deleted = v_array('deleted', $_GET)) {
        $class = $deleted == 'yes' ? 'success' : 'error';
        $title = v_array('title', $_GET) ?: 'The event';
        $message = $deleted == 'yes' 
            ? $title.' was deleted successfully!' 
            : 'There was an error deleting '.$title.'.';

        echo "<div class='alert $class'>$message</div>";
    } 
    ?>
  
</div>
    
 
        <form  id="myFormId" name="form1" method="post"  class="mainform" action="tipupload.php" enctype="multipart/form-data">
 

            <h2>Event Input Form</h2>
            <p>Submit a new event to WDV341 Events:</p>
            <p>
                
            <p>
                <span id="error_title" class="error"><?=$error_title?></span><br>
                <label for="title">Name of Garden tip:</label>
                <input type="text" name="title" id="title" value="<?=$title ? $title : ''?>" placeholder="Jane" >
            </p>

             <p>
                <span id="error_author" class="error"><?=$error_author?></span><br>
                <label for="author">Name of the author:</label>
                <input type="text" name="author" id="author" value="<?=$author ? $author : ''?>" placeholder="Doe">
               
                
            </p>

            <p>
                <span id="error_date" class="error"><?=$error_date?></span><br>
            <label for="date">Tip added in :</label>
             <input type="date" name="date" id="date" value="<?=$date ? $date : ''?>">
            </p>


            <p>
            <span id="error_time" class="error"><?=$error_time?></span><br>
            <label for="time">Tip added at:</label>
            <input type="time" name="dont_you_do_it" id="dont-you-do-it" value=""/>
             <input type="text" name="time" id="time" value="<?=$time ? $time : ''?>" placeholder="ex: 12:00:02">
            </p>
            <p>
                <span id="error_description" class="error"><?=$error_description?></span><br>
                <label for="description">Tip Description:</label><br>
                <textarea rows="4" cols="50" name="description" id="description" value="<?=$description ? $description : ''?>"/></textarea>
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
         
       
         <h2>
     <a href="in_tip.php" class="button"> + Add New Event</a>
    </h2> 
        
        <div>

    <?php foreach($Tips as $Tips) {//loop through events ?>

        <div class="row pt-5 mt-30">
        <div class="col-lg-12 col-sm-6 mb-30 pb-5">
            <div class="card">
                <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="fa fa-user fa-3x head-icon"></i></div>
                <div class="card-body text-center">

                    <h3 class="card-title pt-1"> <?=$Tips['title']//title?></h3>
                    <p class="card-text text-sm">Description:<?=$Tips['description']//=event name?></p><span class="text-sm text-uppercase font-weight-bold">Author:<?=$Tips['author']//=event name?></span>
                    <p> Date posted: <?=$Tips['date']?> , at: <?=$Tips['time']?>
                        <i class="fe-icon-arrow-right"></i></span>
                  <!-- delete  -->
                 <div class="actions">
                        <a href="javascript:deleteEventCheck('<?=$Tips['id']?>', '<?=$Tips['title']?>')">
                        <img class="action" src="images/delete.svg" alt="Delete" />
                    </div>
                    <!-- end of delete -->
                  </div>
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
            <li><a href="index.html"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="about.html"><i class="fa fa-angle-double-right"></i>About us</a></li>
            <li><a href="services.html"><i class="fa fa-angle-double-right"></i>Services</a></li>
            <li><a href="portfolio.html"><i class="fa fa-angle-double-right"></i>Portfolio</a></li>
            <li><a href="contact.php"><i class="fa fa-angle-double-right"></i>Contact us</a></li>
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
      <center style="color:#4fa56e; text-align: center;">
       Copyright <?php echo date('Y');?> Jael Colima. All rights reserved
    </center>
    </div>
  </section>





</body>
</html>