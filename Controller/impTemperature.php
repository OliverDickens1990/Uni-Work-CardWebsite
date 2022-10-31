<?php
include("../Model/apiMethods.php") ;
//  get the new data
$message = file_get_contents('php://input');
$res = createMessage($message);

?>
