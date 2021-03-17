
<?php
require_once('dbConnect.php');


$db_time_format = 'H:i:s';

$db_date_format = 'Y-m-d';


$query = "SELECT *";
$query .= "FROM WDV341_Events";
$query .= " WHERE presenter = 'the chef'";
$queryObj = $conn->query($query);
$results = $queryObj->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>'; print_r($results); echo '</prev>';

$conn = null;

?>
<style>

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

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <h1>INTRO TO PHP</h1>
<h2>Displaying ONE event from database-Unit 7B</h2>
<h2>One event pulled by name </h2>
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
</body>
</html>

