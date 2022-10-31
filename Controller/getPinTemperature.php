<?php
Include '../Model/apiMethods.php';

$pin8Data = GetPin8Temperature($pin8Array);

$pin8Data = json_decode($pin8Data);


// $pin8Array[] = json_decode($pin8Data);
//
//
// $pin9Data = GetPin8Temperature();
// $pin9Array[] = json_decode($pin9Data);



?>
