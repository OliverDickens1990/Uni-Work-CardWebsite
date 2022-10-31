<?php

Include '../Model/apiMethods.php';

$c_questions = getAllQuestions();
$questionArray = json_decode($c_questions);
?>
