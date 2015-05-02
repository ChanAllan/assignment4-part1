<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//header('Content-Type: text/plain');

echo '<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Assignment4-Part1: multtable</title>
</head>
<body>';

/*This function was obtained from a commenter (Simon Neaves) on php.net on
the functions is_int page (http://php.net/manual/en/function.is-int.php).
It has been noted that this would work better in terms of testing an int.*/
function isInteger($input) {
	return(ctype_digit(strval($input)));
}


/*Checks if variables (min/max multiplicand/multiplier) exists 
and if it does, assigns it the value passed in*/
if(isset($_GET['min-multiplicand'])) {
	$min_multiplicand = $_GET['min-multiplicand'];
} else {
  	echo 'Missing parameter: min-multiplicand';
}
if(isset($_GET['max-multiplicand'])) {
	$max_multiplicand = $_GET['max-multiplicand'];
} else {
  echo 'Missing parameter: max-multiplicand';
}
if(isset($_GET['min-multiplier'])) {
	$min_multiplier = $_GET['min-multiplier'];
} else {
  echo 'Missing parameter: min-multiplier';
}
if(isset($_GET['max-multiplier'])) {
	$max_multiplier = $_GET['max-multiplier'];
} else {
  echo 'Missing parameter: max-multiplier';
}


/*Checks if variables (min/max multiplicand/multiplier) are
integers with the isInteger function obtained from php.net.
A message will print if variables are not integers.*/
if(!isInteger($min_multiplicand)) {
  echo 'Invalid input, min-multiplicand must be an integer';
}
if(!isInteger($min_multiplier)) {
  echo 'Invalid input, min-multiplier must be an integer';
}
if(!isInteger($max_multiplicand)) {
  echo 'Invalid input, max-multiplicand must be an integer';
}
if(!isInteger($max_multiplier)) {
  echo 'Invalid input, max-multiplier must be an integer';
}


/*Checks that min multiplicand/multiplier is less than max multiplicand/multipier*/
if($min_multiplicand > $max_multiplicand) {
  echo 'min-multiplicand larger than max-multiplicand';
}
if($min_multiplier > $max_multiplier) {
  echo 'min-multiplier larger than max-multiplier';
}


/*Set variables to prepare for table where left of table will be the multiplicand
and the top of table will be the multiplier*/
$tall = ($max_multiplicand - $min_multiplicand) + 2;
$wide = ($max_multiplier - $min_multiplier) + 2;

echo '<table id="mult_table">';
echo '<caption>Multiplication Table</caption>';

for($i = 0; $i < $tall; $i++) {
	$row_multiplicand = $min_multiplicand + $i -1;	
	echo '<tr>';

	if($i === 0) {
		echo '<td>';
	} else {
		echo "<td>$row_multiplicand";
	}

	for($j = 0; $j < $wide; $j++) {
	  $col_multiplier = $min_multiplier + $j -1;
      
      if($j > 0) {
        if($i === 0) {
      	  echo "<td>$col_multiplier";
        } else {
          $product = $row_multiplicand * $col_multiplier;
          echo "<td>$product";      
        }
      } 
	}
}
echo '</table>';



echo '</body>
</html>';

?>