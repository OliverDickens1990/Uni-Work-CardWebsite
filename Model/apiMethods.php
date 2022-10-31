<?php
// This has been my bible for REF's: https://www.php.net/
//Read All Teams
function GetAllTeams()
{
  // https://www.php.net/manual/en/pdostatement.rowcount.php
    require_once 'connection.php';
    $sql = "SELECT * FROM c_team";

    $stmt = $connection->prepare($sql);
    $result = $stmt->fetch();
    $success = $stmt->execute();

    if($success && $stmt->rowCount() > 0)
    {
            $rows = array();
      while($r = $stmt->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
    }
}

//Read team by ID
function getTeamByID($teamID)
{
  require 'connection.php';

  $query = $connection->prepare
  ("

   SELECT * FROM c_team
   LEFT JOIN c_stadium ON c_stadium.teamID=c_team.teamID
   LEFT JOIN c_description ON c_description.teamID=c_team.teamID
   LEFT JOIN c_article ON c_article.teamID=c_team.teamID
   WHERE c_stadium.teamID=$teamID

  ");
//  SELECT * FROM c_team WHERE teamID = :teamID LIMIT 1
  $success = $query->execute
  ([
    'teamID' => $teamID
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find this Team";
  }
}

function getAllQuestions()
{
  require_once 'connection.php';

  $sql = "SELECT * FROM c_questions";
  $stmt = $connection->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Read team by ID
function getQuestionsByID($teamID)
{
  require 'connection.php';

  $query = $connection->prepare
  ("

   SELECT * FROM c_questions
   WHERE questonID=$questionID

  ");

  $success = $query->execute
  ([
    'questionID' => $questionID
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find this question";
  }
}

function getAllAnswers()
{
  require_once 'connection.php';

  $sql = "SELECT * FROM c_answers";
  $stmt = $connection->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

function AttemptRegister()
{
  Require 'connection.php';

    $username = (filter_input(INPUT_POST, 'reg_user', FILTER_SANITIZE_STRING));
    $email =(filter_input(INPUT_POST, 'reg_email'));
    $password = (filter_input(INPUT_POST, 'reg_password', FILTER_SANITIZE_STRING));
    $passwordRepeat = (filter_input(INPUT_POST, 'reg_passwordRepeat', FILTER_SANITIZE_STRING));

    // Hashing the users password using PASSWORD_DEFAULT, the most upto date secure way.
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Create SQL Template
    $query = $connection->prepare
    ("
    INSERT INTO c_user (username, email, password)
    VALUES(:reg_user, :reg_email, :reg_password)
    ");

    // Runs and executes the query
    $success = $query->execute
    ([
      'reg_user' => $username,
      'reg_email' => $email,
      'reg_password' => $password
    ]);

    // If rows returned is more than 0 Let us know if it inserted or not.
    $count = $query->rowCount();
    if($count > 0)
    {
      $invalidError = "INSERT_SUCCESSFUL";
      header('location: ../View/registerSignInPage.php?error='.$invalidError);
    }
    else
    {
      $invalidError = "INSERT_FAILED";
      header('location: ../View/registerSignInPage.php?error='.$invalidError);
    }

  //TODO:WILL TEST THIS AGAIN LATER AS IT BREAKS MY CODE
  // If users parshly input there data


  // if(empty($username)|| empty($email)|| empty($password)|| empty($passwordRepeat))
  //   {
  //     header("location: ../View/block2.php?error=emptyfields&reg_user=".$username."reg_email=".$email."");
  //     exit();
  //     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
  //       header("location: ../View/block2.php?error=invalidMAILUID");
  //       exit();
  //       }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  //         header("location: ../View/block2.php?error=invalidMAIL&UID=".$username);
  //         exit();
  //         }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
  //           header("location: ../View/block2.php?error=invalidUID&MAIL=".$email);
  //           exit();
  //           }elseif($password !==$passwordRepeat){
  //           header("location: ../View/block2.php?error=PASSWORDCHECK&UID=".$username."&mail=".$email);
  //           exit();
  //             }else{
  //               $sql = "SELECT * FROM c_user WHERE userID=?";
  //               $stmt = PDO_stmt_init($connection);
  //               if(!PDO_stmt_init($stmt, $sql)){
  //                 header("location: ../View/block2.php?error=sqlerror");
  //                 exit();
  //               }else{
  //                 PDO_stmt_bind_param($stmt, "s", $username);
  //                 PDO_stmt_exectue($stmt);
  //                 PDO_stmt_store_result($stmt);
  //                 $resultCheck = PDO_stmt_num_rows($stmt);
  //                 if($resultCheck > 0){
  //                   header("location: ../View/block2.php?error=USERTAKEN&mail".$mail);
  //                   exit();
  //                 }else{
  //                   $sql = "INSERT INTO c_user (username, password, email ) VALUES (?,?,?)";
  //                   $stmt = PDO_stmt_init($connection);
  //                   if(PDO_stmt_prepare($stmt, $sql)){
  //                     header("location: ../View/block2.php?error=SQLERROR");
  //                     exit();
  //                   }else{
  //                     // Hashing the users password using default, the most upto date secure way.
  //                     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  //                     PDO_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
  //                     PDO_stmt_exectue($stmt);
  //                     header("location: ../View/block2.php?REGISTRATION=SUCCESS");
  //                     exit();
  //                   }
  //                 }
  //               }
  //             }
  //             PDO_stmt_close($stmt);
  //             PDO_close($connection);
}



//Login user
function AttemptLogin()
{
  Require 'connection.php';

  if (isset($_POST["loginbtn"]))
  {
    $username = filter_input(INPUT_POST, 'Login_username', FILTER_SANITIZE_STRING);

    $password = filter_input(INPUT_POST, 'Login_password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM c_user WHERE username = :Login_username LIMIT 1";

    $stmt = $connection->prepare($sql);

    $success = $stmt->execute(['Login_username' => $username]);

    if($success && $stmt->rowCount() > 0)
    {
      $result = $stmt->fetch();

      if ($result && password_verify($password, $result['password']))
      {

        // REF: https://stackoverflow.com/questions/1545357/how-to-check-if-a-user-is-logged-in-in-php
        $_SESSION['UserLoggedIn'] = true; // This sets user to UserLoggedIn

        $_SESSION['username'] = $result['username']; // Setting Username to chosen username by user
        $_SESSION['userID'] = $result['userID'];
        header('location: ../View/block2.php?YOU_HAVE_SUCCESFULLY_SIGNED_IN'); // Redirect

      }
    }
    else
    {
      // did not find your records
      $invalidError = "WE_COULD_FIND_YOUR_RECORD";
      header('location: ../View/registerSignInPage.php?error='.$invalidError);
    }
  }

}


//this function logs users out to my index screen
function AttemptLogOut()
{
  session_start(); // this starts the session
  session_destroy(); // this kills the session
  header("Location: ../index.php");//logs users out to my index.php page
}


function attemptInsertQuestion($userID)
{
  Require 'connection.php';
  // this is called form createQuestion page
  if (isset($_POST['insertQuestionSubmit']))
  {
    $question = (filter_input(INPUT_POST, 'question', FILTER_SANITIZE_STRING));

    //inputs data in db
    $query = $connection->prepare
    ("
    INSERT INTO c_questions(question, userID)
    VALUES (:question, :userID)
    ");

    $success = $query->execute
    ([
      'question' => $question,
      'userID' => $userID
    ]);

    $count = $query->rowCount();
    if($count > 0)
    {
      $invalidError = "INSERT_SUCCESSFUL";
      header('location: ../View/block2.php?error='.$invalidError);
    }
    else
    {
      $invalidError = "INSERT_FAILED";
      header('location: ../View/block2.php?error='.$userID);
    }
  }
}

function AttemptUpdateQuestion()
{
  Require 'connection.php';
  // Checks if submit button has been pressed
  if (isset($_POST['updateQuestionSubmit']))
  {
    $quesrtionID = (filter_input(INPUT_POST, 'question', FILTER_SANITIZE_STRING));
    $query = $connection->prepare
    ("
    UPDATE c_questions
    SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
    WHERE questionID = 1;
    ");

    $success = $query->execute
    ([

    ]);

    $count = $query->rowCount();
    if($count > 0)
    {
      $invalidError = "INSERT_SUCCESSFUL";
      header('location: ../View/block2.php?error='.$invalidError);
    }
    else
    {
      $invalidError = "INSERT_FAILED";
      header('location: ../View/block2.php?error='.$invalidError);
    }
  }
}


function RemoveQuestionByID($questionID)
{
  require 'connection.php';

  $stmt = $connection->prepare
  (
    "DELETE FROM c_questions WHERE questionID = :questionID"
  );

  $success = $stmt->execute
  ([

  ]);

  if($count > 0)
  {
    $invalidError = "INSERT_SUCCESSFUL";
    header('location: ../View/block2.php?error='.$invalidError);
  }
  else
  {
    $invalidError = "INSERT_FAILED";
    header('location: ../View/block2.php?error='.$invalidError);
  }
}


// this is the IoT message that get inseted into the databse
function createMessage($message)
{
  Require 'connection.php';
  $sql = $connection->prepare
  ("
  INSERT INTO c_electricimp( message )
  VALUES ('$message')
  ");

  $success = $sql->execute
  ([
    'message' => $message
  ]);
  $count = $sql->rowCount();
  if($count > 0)
  {
    echo $count." Rows effected"."";
  }
  else
  {
    echo "Inserting".$message." Failed"."";
  }

}

function getimpTemperature()
{
    Require 'connection.php';
    //sql call from database
    $sql = "SELECT * FROM c_electricimp ORDER BY id DESC LIMIT 12";

    $stmt = $connection->prepare($sql);
    $result = $stmt->fetch();
    $success = $stmt->execute();

    if($success && $stmt->rowCount() > 0)
    {
      //  convert to JSON
      $rows = array();
      while($r = $stmt->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
  }
}
function GetLastimpTemperature()
{
    Require 'connection.php';
    //Desc limit 1 means i will only get the last entry to the database
    $sql = "SELECT * FROM c_electricimp ORDER BY id DESC LIMIT 1";

    $stmt = $connection->prepare($sql);
    $result = $stmt->fetch();
    $success = $stmt->execute();

    if($success && $stmt->rowCount() > 0)
    {
      //  convert to JSON
      $rows = array();
      while($r = $stmt->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
  }
}

//REF: https://stackoverflow.com/questions/5366620/storing-database-records-into-array
function GetPin8Temperature()
{
    Require 'connection.php';
    // run query
    //Desc limit 12 means i will only get the last 12 entrys to the database
    $sql = "SELECT SUBSTRING(message, 15, 2) AS ExtractString FROM c_electricimp ORDER BY id DESC LIMIT 12";
    // set array
    $pin8Array = array();
    // look through query
    if(mysqli_num_rows($sql) > 0){
      while($row=mysqli_fetch_assoc($sql))
      {
        // add each row returned into an array
        $pin8Array[]= $row;
    }
    return json_encode($pin8Array);
  }
}
function GetPin9Temperature()
{

    Require 'connection.php';
    //Desc limit 12 means i will only get the last 12 entrys to the database
    $sql = "SELECT SUBSTRING(message, 48, 2) AS ExtractString FROM c_electricimp ORDER BY id DESC LIMIT 12";
    $res = mysqli_query($connection,$query);
    while($data=mysqli_fetch_array($res)){
      $message=$data['message'];
    }
}

// found good knowledge on this website
//REF: http://programmerblog.net/how-to-generate-xml-files-using-php/
function getAllArticles()
{
  Require 'connection.php';
  $sql = "SELECT articleID, articleTitle, article, articleLink, articleImage FROM c_article";
  if($result = mysqli_query($connection, $sql))
  {
    $rows = array();
     /* fetch associative array */
    while($row = mysqli_fetch_assoc($result)){
      array_push($rows, $row);
    }
    if(count($rows)){
      createXMLfile($rows);
    }
    else{
      $invalidError = "xml failed to load";
      header('location: ../View/Block4/articlesRSSFeed.php?error='.$invalidError);
    }
  }
  // found good knowledge on this website
  //REF:http://programmerblog.net/how-to-generate-xml-files-using-php/
function createXMLFile($rows){
  $filePath= 'https://mayar.abertay.ac.uk/~1805914/cmp306/View/Block4/articlesRSSFeed.xml';
  for($i=0; $i < count($rows); $i++)
  {
    $articleID = $rows[$i]['articleID'];
    $articleTitle = $rows[$i]['articleTitle'];
    $article = $rows[$i]['article'];
    $articleLink = $rows[$i]['articleLink'];
    $articleImage = $rows[$i]['articleImage'];


    $article = $dom->createElement('article');
    $article->setAttribute('id', $articleID);

    $title = $dom->createElement('title', $articleTitle);
    $article->setAttribute($title);

    $description = $dom->createElement('description', $article);
    $article->setAttribute($description);

    $link = $dom->createElement('link', $articleLink);
    $article->setAttribute($link);

    $image = $dom->createElement('image', $articleImage);
    $article->setAttribute($image);

    $root->appendChild($article);
  }
  $dom->appendChild($root);
  $dom->save($filePath);

}

}
