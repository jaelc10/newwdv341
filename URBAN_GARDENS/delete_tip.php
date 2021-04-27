<?php 
require_once('functions.php');
require_once('dbconnect.php');

$id = v_array('id', $_GET);
$title = v_array('title', $_GET);
$result_url = "in_tip.php?title=$title&deleted";

try {
    $query = "DELETE FROM ugardens WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $id);
    $num_deleted = $stmt->execute();
    $conn = null;

    header("Location: $result_url=yes");
} catch(PDOException $e) {
    $conn = null;
    write_log($e->getMessage());
    header("Location: $result_url=no");
}
?>