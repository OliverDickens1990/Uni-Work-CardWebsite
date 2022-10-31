<?php
$questionID= $_GET['id'];
if(!isset($questionID))
{
  header('location: ../View/block2.php?error=No question ID found');
}
else
{
  Include '../Model/apiMethods.php';

  $c_questions = getTeamByID($questionID);
  $questionArray = json_decode($c_questions);
}
?>
