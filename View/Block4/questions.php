<?php
	// Connect to database
	include("connection-abertay.php");

	$connection =  getConnectionString() ;

	// library contains all the methods required from the Web Service
	include("library.php");

	$request_method=$_SERVER["REQUEST_METHOD"];
	// $call = $_SERVER["PHP_SELF"];
	// $request = $_SERVER['REQUEST_URI'];

	switch($request_method)
	{
		case 'GET':
			// Retrive Products
			if(isset($_GET['id']))
			{
				$id=$_GET["id"];
				$resp = getQuestion($id);
				echo $resp ;
			}
			else
			{
				$resp = getAllQuestions();
				echo $resp ;
			}
			break;
		case 'POST':
			// Insert Product
			$resp = insertQuestion();
			echo $resp ;
			break;
		case 'PUT':
			// Update Product
			$id=$_GET["id"];
			$resp = updateQuestion($id);
			echo $resp ;
			break;
		case 'DELETE':
			// Delete Product
			$id=$_GET["id"];
			$resp = deleteQuestion($id);
			echo $resp ;
			break;

		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

?>
