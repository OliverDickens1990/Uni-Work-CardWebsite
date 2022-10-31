<?php

Include '../Model/apiMethods.php';

$c_team = GetAllTeams();
$teamArray = json_decode($c_team);
?>
