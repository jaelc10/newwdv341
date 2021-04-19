<?php include 'functions.php'; ?>
<?php include_once 'eventsform.php';?>
<?php
date_default_timezone_set('America/Chicago');

try {
    $conn = db_connect();
    $Name = v_array('Name', $_POST);
    $description = v_array('description', $_POST);
    $presenter = v_array('presenter', $_POST);
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = date('H:i:s', strtotime($_POST['time']));
     $current_date = date('Y-m-d H:i:s');;

    if(!$Name || !$description || !$presenter || !$date || !$time ) {
        throw new Exception('Please check you information to make sure it is correct');
    }

    // Get image data, save image to server
    

    
    $data = array(
        'Name' => $Name,
        'description' => $description,
        'presenter' => $presenter,
        'date' => $date,
        'time' => $time,
        'date_inserted' => $current_date,
        'date_updated' => $current_date
    );
    $query = 'INSERT INTO  WDV341_Events (Name, description, presenter, date, time, date_inserted, date_updated)
        VALUES (:Name, :description, :presenter, :date, :time, :date_inserted, :date_updated)';

   $stmt = $conn->prepare($query);
    $result = $stmt->execute($data);
    

} catch(PDOException $e) {
    write_log($e->getMessage());
} catch(Exception $e) {
    write_log($e->getMessage());
}

$conn = null;
$message = $result ? '?result=success' : '?result=failed';
 header("Location: eventsform.php$message");

?>