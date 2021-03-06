<?php
require_once('dbConnect.php');

$db_time_format = 'H:i:s';
$db_date_format = 'Y-m-d';

$query = 'SELECT *';
$query .= 'FROM WDV341_Events';
$queryOBj = $conn->query($query);

$results = $queryOBj->fetchAll();

//echo '<pre>'; print_r($results); echo '</pre>';


?>

<!DOCTYPE html>
<html>
<head>
	<title>UNIT-7HW</title>
    <style>
        body{
            text-align: center;
        }
        .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: 10px;
  background-color: pink;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255);
  text-align: center;
  padding: 20px 0;
  font-family: Georgia;
  
}
    </style>
</head>
<body>
<h1>INTRO TO PHP</h1>
<h2>Displaying events from database-Unit 7A</h2>
<section>
    

        <div class="grid-container">

        <?php foreach($results as $results) {//loop through events ?>
        <div class="eventBlock">
            <div>
                <span class="displayEvent">
                    Event: <?=$results['Name']//=event name?>
                </span>
                <div>
                    Presenter: <?=$results['presenter']//=presenter?>
                </div>
                <div>
                    <span class="displayTime">
                        <?php $time = DateTime::createFromFormat($db_time_format, $results['time']);?>
                        Time: <?=$time->format('g:i a') //=formatted time?>
                    </span>
                </div>
                <div>
                    <span class="displayDate">
                        <?php $date = DateTime::createFromFormat($db_date_format, $results['date']);?>
                        
                        Date: <?=$date->format('l M. d, Y')//=formatted date?>
                    </span>
                </div>
            </div>
            <div>
                <span class="displayDescription">
                    Description:<br> <?=$results['description']//=description?>
                </span>
            </div>
        </div>
        <?php }//close event loop ?>
    </section>
</div>
</body>
</html>
