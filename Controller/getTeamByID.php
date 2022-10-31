<?php
$teamID= $_GET['id'];
if(!isset($teamID))
{
  header('location: ../View/block1.php?error=No team ID found');
}
else
{
  Include '../Model/apiMethods.php';

  $c_team = getTeamByID($teamID);
  $teamArray = json_decode($c_team);
}
?>
