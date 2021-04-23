<?php 

include_once 'functions.php';
include 'validating.php';

$Events = get_events(); 
$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';


 
$valid_form = true;
$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST);
$result = v_array('result', $_GET);
$Name = '';
$presenter = '';
$description = '';
$date = '';
$time = '';
//errors
$error_Name = '';
$error_presenter = '';
$error_description = '';
$error_date = '';
$error_time = '';
//end errors
$valid_form_submission = $form_submitted && !$honeypot_value;

if($valid_form_submission){

$Name = v_array('Name', $_POST);
$presenter = v_array('presenter', $_POST);
$description = v_array('description', $_POST);
$date = v_array('date', $_POST);
$time = v_array('time', $_POST);
   

  
if(!valid_Name($Name)) {
        $valid_form = false;
        $error_Name = '* Please enter an event name';
    }

    if(!valid_description($description)){
        $valid_form = false;
        $error_description = '* Please give an event description';
    }

    if(!valid_presenter($presenter)){
        $valid_form = false;
        $error_presenter = '* Please give an event presenter';
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
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert Event</title>
</head>

<style>
   body {
    text-align: center;
   }
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

<section>
    <center>
   <?php if($valid_form_submission){ ?>
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event was added</p>
        </div>
         <?php } ?> 
        <?php if(!$valid_form_submission) { ?>  
        <form  id="myFormId" name="form1" method="post" action="eventupload.php" enctype="multipart/form-data">
 

            <h2>Event Input Form</h2>
            <p>Submit a new event to WDV341 Events:</p>
            <p>
                <!--
                <label for="presenter">Name of the presenter:</label>
                <input type="text" name="presenter" id="presenter" value=""/>
               
                
            </p>

            <p>
                
                <label for="Name">Name of Event:</label>
                <input type="text" name="Name" id="Name" value=""/>
            </p>

            <p>
               
            <label for="date">Event Date:</label>
             <input type="date" name="date" id="date" value=""/>
            </p>


            <p>
            
            <label for="time">Event Time:</label>
            <input type="text" name="dont_you_do_it" id="dont-you-do-it" value=""/>
             <input type="time" name="time" id="time" value=""/>
            </p>
            <p>
                
                <label for="description">Event Description:</label>
                <input name="description" id="description" value=""/>
            </p>
            <p>
               
            </p>
            <p class="buttons">
                <input type="submit" name="submitted" id="event_submit" value="Submit">
                <input name="reset" type="reset" onclick="resetForm('myFormId'); return false;" />
            </p>

             <span id="error_event_presenter" class="error"><?=$error_event_presenter?></span>
                <label for="event_presenter">Name of the presenter:</label>
                <input type="text" name="event_presenter" id="event_presenter" value="<?=$event_presenter ? $event_presenter : ''?>">
               
                
            </p>-->

            <p>
                <span id="error_Name" class="error"><?=$error_Name?></span>
                <label for="Name">Name of Event:</label>
                <input type="text" name="Name" id="Name" value="<?=$Name ? $Name : ''?>">
            </p>

             <p>
                <span id="error_presenter" class="error"><?=$error_presenter?></span>
                <label for="presenter">Name of the presenter:</label>
                <input type="text" name="presenter" id="presenter" value="<?=$presenter ? $presenter : ''?>">
               
                
            </p>

            <p>
                <span id="error_date" class="error"><?=$error_date?></span>
            <label for="date">Event Date:</label>
             <input type="date" name="date" id="date" value="<?=$date ? $date : ''?>">
            </p>


            <p>
            <span id="error_time" class="error"><?=$error_time?></span>
            <label for="time">Event Time:</label>
            <input type="time" name="dont_you_do_it" id="dont-you-do-it" value=""/>
             <input type="text" name="time" id="time" value="<?=$time ? $time : ''?>">
            </p>
            <p>
                <span id="error_description" class="error"><?=$error_description?></span>
                <label for="description">Event Description:</label>
                <input name="description" id="description" value="<?=$description ? $description : ''?>"/>
            </p>
            <p>
               
            </p>
            <p class="buttons">
                <input type="submit" name="submitted" id="event_submit" value="Submit">
                <input name="reset" type="reset" onclick="resetForm('myFormId'); return false;" />
            </p>


        </form>
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
           <h2> Current Events: </h2>
            <?php foreach($Events as $event) { ?>
                <div>
                    
                     <p>Event Name:    <?=$event['Name']?></p>
                    <p>Event Description:   <?=$event['description']?></p>
                    <p>Event Presenter:  <?=$event['presenter']?></p>
                    <p>Event Date:    <?=$event['date']?></p>
                    <p>Event Time:    <?=$event['time']?></p><br>
                   
                </div>
            <?php } ?>
        </div>
        </center>
         
        <p>&nbsp;</p>

    </div>
</section>
</body>

</html>
