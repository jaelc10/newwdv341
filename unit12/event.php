
<?php
include 'validation.php';
include_once 'functions.php';

$events = get_events();
$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$valid_form = true;
$honeypot_value = v_array('do_not_touch', $_POST);
$error_presenter = '';
$error_name = '';
$error_description = '';
$error_date = '';
$error_time = '';
$form_submitted = v_array('submit', $_POST);
$name = '';
$presenter = '';
$description = '';
$date = '';
$time = '';
$result = v_array('result', $_GET);

if($form_submitted){
    $name = v_array('name', $_POST);
    $description = v_array('description', $_POST);
    $presenter = v_array('presenter', $_POST);
    $date = v_array('date', $_POST);
    $time = v_array('time', $_POST);
    

    if(!valid_name($name)) {
        $valid_form = false;
        $error_name = 'Please enter an event name';
    }

    if(!valid_description($description)){
        $valid_form = false;
        $error_description = 'Please give an event description';
    }

    if(!valid_presenter($presenter)){
        $valid_form = false;
        $error_presenter = 'Please give an event presenter';
    }


    if(!valid_date($date)){
        $valid_form = false;
        $error_date = 'Please give an event date';
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
    <title>Self-Posting Form Validation</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
        #form-content {padding-bottom:5rem;display:flex;flex-wrap:wrap;justify-content:space-between;max-width:50rem;margin:0 auto;}
        #form-content div:first-child {width:100%;}
        .error {display:block;font-size:0.7rem;color:#cc0000;}
        #do-not-touch{display: none}
    </style>
</head>
<body>
    <header>
        <h1>WDV341 Intro <span>PHP</span></h1>
        <p>Unit-11 Self Posting Form With Validation</p>
        <h3><strong>Event Form</strong></h3>
        <p>Let's create an event</p>
    </header>
    <section>
        <?php if($valid_form && $form_submitted && !$honeypot_value){ ?>
        <div>
            <h2>Form submission successful!</h2>
            <p>Your event was added</p>
        </div>
         <?php } ?> 
        <?php if(!$valid_form && $form_submitted || !$form_submitted || $honeypot_value) { ?>  
        <div id="form-content">
            <form name="form1" id="form-1" method="post" action="event-upload.php" enctype="multipart/form-data">
                <p>
                    <span id="error-name" class="error"><?=$error_name?></span>
                    <label for="name">Event Name: </label>
                    <input type="text" name="name" id="name" value="<?=$name ? $name : ''?>">
                
                </p>
                <p>
                    <span id="error-description" class="error"><?=$error_description?></span>
                    <label for="description">Event Description: </label>
                    <input type="text" name="description" id="description" value="<?=$description ? $description : ''?>">
                </p>
                <p>
                    <span id="error-presenter" class="error"><?=$error_presenter?></span>
                    <label for="presenter">Event Presenter: </label>
                    <input type="text" name="presenter" id="presenter" value="<?=$presenter ? $presenter : ''?>">
                </p>
                <p>
                    <span id="error-date" class="error"><?=$error_date?></span>
                    <label for="date">Event Date: </label>
                    <input type="text" name="date" id="date" value="<?=$date ? $date : ''?>" placeholder = "ex. 2021-03-04">
                </p>
                <p>
                    <span id="error-time" class="error"><?=$error_time?></span>
                    <label for="time">Event Time: </label>
                    <input type="text" name="time" id="time" value="<?=$time ? $time : ''?>" placeholder = "ex. 18:00:00">
                </p>
                <p>
                    <input type="submit" name="submit" id="submit" value="Submit">
                    <input type="reset" name="Reset" id="button" value="Reset">
                </p>
                <input type="text" name="do_not_touch" id="do-not-touch" value=""/> 
            </form>
        </div>
        <?php } ?>
        <table class="center" id="events">
		<tr>
			<th>Event</th>
			<th>Presenter</th>
			<th>Time</th>
			<th>Date</th>
			<th>Description</th>
		</tr>
	<?php foreach($events as $result) { ?>
		<tr>
			<td><?=$result['name']?></td>
			<td><?=$result['presenter']?></td>
			<?php $time = DateTime::createFromFormat($db_time_format, $result['time']); ?>
			<td><?=$time->format('g:i a')?></td>
			<?php $date = DateTime::createFromFormat($db_date_format, $result['date']); ?>
			<td><?=$date->format('l M. d, Y')?></td>
			<td><?=$result['description']?></td>
		</tr>
	<?php } ?>
	</table>
 </section>
</body>
</html>
