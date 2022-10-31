<?php

Include '../Model/apiMethods.php';

$c_answers = getAllAnswers();
$answerArray = json_decode($c_answers);
?>
