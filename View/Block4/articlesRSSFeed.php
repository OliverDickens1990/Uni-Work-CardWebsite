
<?php

include "../Controller/getAllArticles.php";


// ?>
<?php
//  code to list the contacts plus their first phone number
//TODO: Convert this to meet my code
$xmltxt = file_get_contents('../model/contacts.xml');
$xml = simplexml_load_string($xmltxt)  ;

echo "<br/><br/>" ;
$num = sizeof($xml->contact) ;
echo "<h1>There are $num contacts</h1>" ;
echo "<br/>" ;
for ($i=0; $i<$num; $i++) {
	echo $xml->contact[$i] -> name ;
	echo " " ;
	echo $xml -> contact[$i] -> phones -> phone[0] ;
	echo "<br/>" ;
}
?>
