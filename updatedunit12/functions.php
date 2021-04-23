<?php 
require_once('dbconnect.php');

function write_log($log, $location = 'debug.log') {
    error_log(print_r($log, true)."\n\r", 3, $location);
}

function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function get_events() {
    $conn = db_connect();
    $query = "SELECT Name, description, presenter, date, time  FROM WDV341_Events ORDER BY Name";

    $query_obj = $conn->query($query);
    $results = $query_obj->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;

    return $results;


}
?>
