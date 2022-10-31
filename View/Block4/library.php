<?php

	// Library of methods to support the Web Service

	// function to get all (max 6) questions
	function getAllQuestions()
	{
		global $connection;
		$query="select * from c_questions order by id desc limit 6";
		$result=mysqli_query($connection, $query);
		$response=array();
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		return json_encode($response);
	}


	//  function to get a specific employee
	function getQuestion($id)
	{
		global $connection;
		$query="select * FROM c_questions where id=".$id ;
		$result=mysqli_query($connection, $query);
		$response=array();
		$response[0] = mysqli_fetch_array($result) ;
		header('Content-Type: application/json');
		return json_encode($response);
	}

	//  function to insert a single employee
	function insertQuestion()
	{
		global $connection;
		$data = json_decode(file_get_contents('php://input'), true);
		$question=$data["question_reads"];
		$dttm=$data["question_dttm"];
		$query="INSERT INTO c_questions SET question='".$question."', dttm='".$dttm."'";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Question Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Question Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		return json_encode($response);
	}

	//  function to update a specific employee
	function updateQuestion($id)
	{
		global $connection;
		$data = json_decode(file_get_contents('php://input'), true);
		$question=$data["question"];
		$dttm=$data["dttm"];
		$query="UPDATE c_questions SET question='".$question."', dttm='".$dttm."' WHERE id=".$id;
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Question Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Question Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		return json_encode($response);
	}

	//  function to delete a specific employee
	function deleteQuestion($id)
	{
		global $connection;
		$query="DELETE FROM c_questions WHERE id=".$id;
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Question Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Question Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		return json_encode($response);
	}

?>
