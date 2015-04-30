<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Assignment4-Part1: login</title>
</head>
<body>

<?php
error_reporting(E_ALL);
init_set('display_errors', 1);
header('Content-Type: text/plain');

echo '<form action="content1.php" method="post">
    <label>Username: </label>
    <input type="text" id="username" name="username">
    <input type="submit" name="submit" value="Login">

  </form>'
?>

</body>
</html>