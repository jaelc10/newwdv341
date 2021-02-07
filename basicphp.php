<?php

    //1. Create a variable called yourName.  Assign it a value of your name.
    $yourName = "Jael Colima";   //Datatype: String Scope:Global
    //4.Create the following variables:  number1, number2 and total.  Assign a value to them.  
    $number1 = 2;
    $number2 = 7;
    $total = $number1+$number2;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <h1 style="text-align: center;">Basic PHP</h1>
    
    <?php 

    echo "<h2> $yourName </h2>" ;
    echo "<h3> Number 1: $number1 </h3>";
    echo "<h3> Number 2: $number2 </h3>";
    echo "<h2> Total: $total </h2>" ;
     ?>

    <script>
    <?php
     


        echo "let languages =['PHP', 'HTML', 'Javascript'];";

        echo "for(let i=0; i < languages.length; i++){
                document.write(languages[i]+ ' ' );
                }";
    ?>
</script>
<p>This is my link to my repo: <a href="https://github.com/jaelc10/webdevelopment341">FIRST BASIC PHP REPO</a></p>
<p>This is the link to my home page: <a href="http://jaelcolima.com/">HOME</a></p>
</body>
</html>