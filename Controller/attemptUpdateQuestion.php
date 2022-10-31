<?php

if(!isset($_POST['updateQuestionSubmit']))
{
  $invalidError = "ACCESS DENIED";
  header('Location: ../View/block2.php?error='.$invalidError);
}
else
{
  include '../Model/apiMethods.php';

  attemptUpdateQuestion();

}
?>
