<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Assignment4-Part1: login</title>
</head>
<body>';

echo '<form action="content1.php" method="post">
    <label>Username: </label>
    <input type="text" id="username" name="username">
    <input type="submit" name="submit" value="Login">

  </form>';


echo '</body>
</html>';

?>