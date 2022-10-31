<?php
try
{
		// Abertay database connections
		$host = "lochnagar.abertay.ac.uk";
		$un = "sql1805914";//oliver_dickens
		$pw = "FTL79WmggxwK";
	  $dbname = "sql1805914";

 // //for use if you copy database to be on localhost
 //  $host ='localhost';
 //  $dbname = 'carddb';
 //  $un = 'root';
 //  $pw = '';

// Create connection
  $connection = new PDO ("mysql:host=$host;dbname=$dbname;charset=UTF8",$un,$pw);
}
// catch to Check connection
catch (PDOException $ex)
{
  print"DATABASE CONNECTION ERROR!:". $ex->getMessage()."<br/>";
  Die("CONNECTION FAILED");
}
?>
