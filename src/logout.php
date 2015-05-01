<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Assignment4-Part1: logout</title>
</head>
<body>

<?php
  /*Code obtained from Sessions lecture video with slight modifications*/
  session_start();
  /*Sets session to an empty array*/
  $_SESSION = array();
  /*Destroys the session id*/
  session_destroy();

  /*Redirects to login.php after ending session*/
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/',$filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;  
  header("Location: {$redirect}/login.php", true);
  die();
?>


</body>
</html>