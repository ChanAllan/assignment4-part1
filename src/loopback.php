<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Assignment4-Part1: loopback</title>
</head>
<body>

<?php
/*Set parameter and arr as an empty array*/
$type;
$parameter = array();
$arr = array();

/*Referred to 
http://stackoverflow.com/questions/409351/post-vs-serverrequest-method-post
for the conditional POST/GET methods
*/
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $type = 'GET';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type = 'POST';
}

/*Some code obtained from variablesandarrays.php file from lecture
 in assigning key=>value pairs
 */
/*http://php.net/manual/en/reserved.variables.server.php comment section
referred to $_SERVER['CONTENT_LENGTH'] to get message-body size attached
to the POST request
*/
if ($type == 'GET') {
  foreach($_GET as $key => $value) {
    $parameter[$key] = $value; 
  }
}
else if ($type === 'POST' && $_SERVER['CONTENT_LENGTH'] != 0) {
  foreach($_POST as $key => $value) {
    $parameter[$key] = $value; 
  }
}
else {
	$parameter = null; /*No parameter passed*/
}

$arr['Type'] = $type;
$arr['parameter'] = $parameter;

/*Referred to http://php.net/manual/en/function.json-encode.php
to use json encode function for an associative array output as object*/
echo json_encode($arr, JSON_FORCE_OBJECT), "\n\n";

?>






</body>
</html>