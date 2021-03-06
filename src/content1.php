<?php
/*Code obtained from PHP Sessions lecture video with
modifications for the assignment requirements*/
/*Starts the session*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(session_status() == PHP_SESSION_ACTIVE) {
  ///////////////////////////////////////////////////////////////////////////////
  /*Testing out get action*/
  if(isset($_GET['action']) && $_GET['action'] == 'logout') {
  /*Code obtained from Sessions lecture video with slight modifications*/
  //session_start();
  /*Sets session to an empty array*/
  $_SESSION = array();
  /*Destroys the session id*/
  session_destroy();

  /*Redirects to login.php after ending session*/
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/',$filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;  
  header("Location: login.php", true);
  die();
  }
  /////////////////////////////////////////////////////////////////////////////////

  /*Checks if username exists*/
  if(isset($_POST['username'])) {
    
    /*Checks if session name exists and if it is the same as the username from 
    the login page, if not then session is set to an empty array*/
    if(isset($_SESSION['name']) && ($_SESSION['name'] != $_POST['username'])) {
    	$_SESSION = array();
    } 

    if(($_POST['username'] == null) || ($_POST['username'] == '')) {
      echo 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.';
    } else {
      /*Assigns session name as username*/
      $_SESSION['name'] = $_POST['username'];
    }

  }

  /*If session name and username does not exisit*/
  if(!isset($_SESSION['name']) && !isset($_POST['username'])) {
  	/*Redirect page to login*/
  	echo 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.';
  }


  /*If visits does not exist then set visits to 0 for the session*/
  if(!isset($_SESSION['visits'])) {
  	$_SESSION['visits'] = 0;
  }

  /*If session name has been assigned, then display message and increment visits counter. An option to logout is provided*/
  if(isset($_SESSION['name'])) {
    echo "Hi $_SESSION[name], you have visited this page $_SESSION[visits] times before. \n";
    $_SESSION['visits']++;

    echo 'Click <a href="content2.php">here</a> to access content2.';
    echo 'Click <a href="content1.php?action=logout">here</a> to log out.';
  }
}

?>
