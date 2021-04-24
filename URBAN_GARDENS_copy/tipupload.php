<?php include 'function_tips.php'; ?>
<?php include_once 'in_tip1.php';?>
<?php
date_default_timezone_set('America/Chicago');

try {
    $conn = db_connect();
    $title = v_array('title', $_POST);
    $description = v_array('description', $_POST);
    $author = v_array('author', $_POST);
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = date('H:i:s', strtotime($_POST['time']));
     $current_date = date('Y-m-d H:i:s');;

    if(!$title || !$description || !$author || !$date || !$time ) {
        throw new Exception('Please check you information to make sure it is correct');
    }

    // Get image data, save image to server
    

    
    $data = array(
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'date' => $date,
        'time' => $time,
        'date_inserted' => $current_date,
        'date_updated' => $current_date
    );
    $query = 'INSERT INTO  ugardens (title, description, author, date, time, date_inserted, date_updated)
        VALUES (:title, :description, :author, :date, :time, :date_inserted, :date_updated)';

   $stmt = $conn->prepare($query);
    $result = $stmt->execute($data);
    

} catch(PDOException $e) {
    write_log($e->getMessage());
} catch(Exception $e) {
    write_log($e->getMessage());
}

$conn = null;
$message = $result ? '?result=success' : '?result=failed';
 header("Location: in_tip1.php$message");

?>