<?php
/*
    Description: Remove Question for Block2.php.
    Author: Oliver Dickens
 */
if(!isset($_POST['removeQuestionSubmit']))
{
  header('Location: ../View/block2.php?error=ACCESS DENIED');
}
else
{

  include '../Model/apiMethods.php';
  removeInsertQuestion() ;//TODO:create this method

}
