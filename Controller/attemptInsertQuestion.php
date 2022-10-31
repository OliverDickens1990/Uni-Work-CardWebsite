
<?php
/*
    Description: Insert Question to Block2.php.
    Author: Oliver Dickens
 */
if(!isset($_POST['insertQuestionSubmit']))
{

  header('Location: ../View/block2.php?error=ACCESS DENIED');
}
else
{

  include '../Model/apiMethods.php';

  session_start();
  attemptInsertQuestion($_SESSION['userID']) ;

}
