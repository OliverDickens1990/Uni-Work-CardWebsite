<?php
include '../Model/apiMethods.php';
session_start();
$Time = time() -10; //this takes 10 seconds off the user before logging them out.
setcookie('UserVisit',$Time);
AttemptLogOut();
  header('Location: ../index.php?error=YOU_ARE_LOGGED_OUT');
?>
