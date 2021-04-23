<?php 
require_once('exception_handlers.php');

function db_connect() {
    $serverName = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'WDV341';

    try {
        $conn = new PDO("mysql:host=$serverName; dbname=$database;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
       // echo "connected successfully";

        return $conn;
    } catch(PDOException $e) {
        set_connection_exception_handler($conn, $e);
        //echo "Problems...";
        error_log($e->getmessage() );
        error_log(var_dump(debug_backtrace() ) );
    }

    return false;
}
?>
$userName = "jaelcolima10_newwdv341"; //user name is used to sign on the database
$password = "Wdv341"; //user name is used to sign on the database

$serverName = "localhost";  //Identifies the database server 
$databaseName = "jaelcolima10_newwdv341"; 