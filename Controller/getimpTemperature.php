<?php

Include '../Model/apiMethods.php';

$c_electricimp = GetimpTemperature();
$impArray = json_decode($c_electricimp);

?>
