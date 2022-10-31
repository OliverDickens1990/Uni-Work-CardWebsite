<?php
//Users log in to access the site
if(!isset($_POST["loginbtn"]))
{
  header('Location: ../View/registerSignInPage.php?error=ACCESS_DENIED');
}
else
{
  include "../Model/session.php";
  include '../Model/apiMethods.php';

  AttemptLogin();
}
