<?php
     
//this is the function in mm/dd/yyyy format
     function regularDate($date) {
     	return "Date = " . date('m/d/Y', strtotime($date));
     }

// this is the interenational function with dd/mm/yyyy format 
 function internationalDate($date) {
 	return "Date = " . date('d/m/Y', strtotime($date) );

     }

function ddMmYyyyDate($inDate) {
	$timeStamp = strtotime($inDate);
	$date = date("d/m/y", $timestamp);
	echo $date;
}




function formatString($inputID) {
	$phrase = $inputID; //cretaes a string 
	echo strlen($phrase)."characters"."<br>";

	echo "the string is:" . trim($phase). "without whitespace" . "<br>";
	echo " Phrase to lower letters: " . strtolower($phrase). "<br>";

	$search = "DMACC";
	$results = strripos($phrase, $search);
	if($results !==false)
	{
		echo 'true';
	}
	else 
	{
		echo "there is no search in this phrase";
	}
}

function phone_number_format($number) {
  // Allow only Digits, remove all other characters.
  $number = preg_replace("/[^\d]/","",$number);
 
  // get number length.
  $length = strlen($number);
 
 // if number = 10
 if($length == 10) {
  $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
 }
  
  return $number;
  
 
}

/*function formatNum($inNum){
	$number = number_format('/^\+\d(\d{3})(\d{3})(\d{4})$/');
	echo(number_format($inNum));
}
*/
function formatMoney($inNum)
{
	$amount = number_format($inNum, 2, ".", ",");
	echo("$". $amount);
}

?>
<!Doctype html> 
<html>
<head>


</head>
<body>
<?php 
echo regularDate("20-08-2020");
?>

<h3> DD//MM/YYYY date </h3>
<p> <?php ddMmYyyyDate("November 24 2020");?></p>

<p> the string in the function contain: <em><strong><?php echo formatString('My school id Dmacc')?> </strong></em></p>


<h3>Formatted Number</h3>
<p><?php echo phone_number_format(1234567890); ?></p>

<h3>Formatted Money </h3>
<p><?php formatMoney(123456); ?></p>
</body>
</html>





















