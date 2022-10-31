<?php
//This is the users registration 
if(!isset($_POST["registerbtn"]))
{
  header('Location: ../View/registerSignInPage.php?error=ACCESS_DENIED');
}
else
{
  include "../Model/session.php";
  include '../Model/apiMethods.php';
  AttemptRegister();
}
