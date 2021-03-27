<?php 
include 'validation.php';

$valid_form = true;
$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST);
$event_name = '';
$event_presenter = '';
$event_description = '';
$event_date = '';
$event_time = '';
//errors
$error_event_name = '';
$error_event_presenter = '';
$error_event_description = '';
$error_event_date = '';
$error_event_time = '';
//end errors
$valid_form_submission = $form_submitted && !$honeypot_value;

if($valid_form_submission){

$event_name = v_array('event_name', $_POST);
$event_presenter = v_array('event_presenter', $_POST);
$event_description = v_array('event_description', $_POST);
$event_date = v_array('event_date', $_POST);
$event_time = v_array('event_time', $_POST);
   

  
if(!valid_event_name($event_name)) {
        $valid_form = false;
        $error_event_name = '* Please enter an event name';
    }

    if(!valid_event_description($event_description)){
        $valid_form = false;
        $error_event_description = '* Please give an event description';
    }

    if(!valid_event_presenter($event_presenter)){
        $valid_form = false;
        $error_event_presenter = '* Please give an event presenter';
    }


    if(!valid_event_date($event_date)){
        $valid_form = false;
        $error_event_date = '* Please give an event date';
    }

    if(!valid_event_time($event_time)){
        $valid_form = false;
        $error_event_time = 'Please give an event time';
    }






}




?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert Event</title>
</head>

<style>
   
    .display {
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form {
        font-family: sans-serif;
        width: 80%;
        max-width: 500px;
        background-color: #0093E9;
        background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        border: dashed 3px lightgray;
        padding: 40px;
        margin-top:80px;
        border-radius: 15px;
        color: white; 
    }

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
        cursor: pointer;
    }
    .output{
        font-family: Arial Black;
        width: 50%;
        margin-top: 40px;
        background-color: pink;
        border: dashed 3px green;
        justify-content: center;
        text-align: center;

    }

    #dont-you-do-it {
            display:none;
        }

    .error{
            color: red;
        }

   

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

<body>

    
    
  <header>  

        <h1 style="text-align: center;"> WDV341 Event forms</h1>

   </header>


   <div class="display">


       

        <form  id="myFormId" name="form1" method="post" action="index.php">
 

            <h2>Event Input Form</h2>
            <p>Submit a new event to WDV341 Events:</p>
            <p>
                <span id="error_event_presenter" class="error"><?=$error_event_presenter?></span>
                <label for="event_presenter">Name of the presenter:</label>
                <input type="text" name="event_presenter" id="event_presenter" value="<?=$event_presenter ? $event_presenter : ''?>">
               
                
            </p>

            <p>
                <span id="error_name" class="error"><?=$error_event_name?></span>
                <label for="event_name">Name of Event:</label>
                <input type="text" name="event_name" id="event_name" value="<?=$event_name ? $event_name : ''?>">
            </p>

            <p>
                <span id="error_event_date" class="error"><?=$error_event_date?></span>
            <label for="event_date">Event Date:</label>
             <input type="date" name="event_date" id="event_date" value="<?=$event_date ? $event_date : ''?>">
            </p>


            <p>
            <span id="error_event_time" class="error"><?=$error_event_time?></span>
            <label for="event_time">Event Time:</label>
            <input type="time" name="dont_you_do_it" id="dont-you-do-it" value=""/>
             <input type="text" name="event_time" id="event_time" value="<?=$event_time ? $event_time : ''?>">
            </p>
            <p>
                <span id="error_event_description" class="error"><?=$error_event_description?></span>
                <label for="event_description">Event Description:</label>
                <input name="event_description" id="event_description" value="<?=$event_description ? $event_description : ''?>"/>
            </p>
            <p>
               
            </p>
            <p class="buttons">
                <input type="submit" name="submitted" id="event_submit" value="Submit">
                <input name="reset" type="reset" onclick="resetForm('myFormId'); return false;" />
            </p>

        </form>
       <div class="output">
        <?php if($form_submitted && $valid_form){ ?>
        
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event called: <?=$event_name?></p>
            <p>Was added thank you!</p>
        </div>
        <?php } elseif($form_submitted) { ?>
        <div>
            <h2>Uh Oh!</h2>
            <p>There was a problem please see the errors below!</p>
        </div>

        </div>
         <?php } ?>
        <p>&nbsp;</p>

    </div>

</body>

</html>
