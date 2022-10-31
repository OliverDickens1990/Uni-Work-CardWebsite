<?php
	//  PHP to get all the employees
	//  URL of the web service
	$url = "https://mayar.abertay.ac.uk/~1805914/cmp306/View/Block4/questions" ;
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  	$resp = curl_exec($curl) ;

  	//  Output the results
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;

  	echo "<br><br>" ;
  	$ques = json_decode($resp) ;


?>
