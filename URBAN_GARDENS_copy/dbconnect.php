
<?php 

/* Connects your php application to a datbase. allows them to communicate*/

$userName = "root"; //user name is used to sign on the database
$password = ""; //user name is used to sign on the database

$serverName = "localhost";  //Identifies the database server 
$databaseName = "WDV341"; 

try {
  
   $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName,$password);

   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);    //prepares statements 
    //testing purposes
}
catch(PDOException $e) {

   echo "Problems.....";
   
   error_log($e->getmessage() );
   error_log(var_dump(debug_backtrace() ) );

}

?>





