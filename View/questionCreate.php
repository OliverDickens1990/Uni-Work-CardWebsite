<?php
include "../Model/session.php";
include 'header.php';
include 'navbar.php';


if(isset($_SESSION['UserLoggedIn']))
{
      echo "<body>
      <div class='container text-center mt-2 mb-2 pt-5 pb-5 '>

      <form method='post' action='../Controller/attemptInsertQuestion.php' >
        <div class='form-group input-group'>
          <div class='input-group-prepend'>
            <span class='input-group-text'>Question</span>
          </div>
            <textarea class='form-control' type='text' name='question' placeholder='Type your question here:' rows='4' required></textarea>
        </div>
        <button class='form-control' type='submit' name='insertQuestionSubmit'>Add Question</button>

      </div>";
        echo "</body>";
include 'footer.php';

}
else
{
  $validError = "ACCESS DENIED";
  header("Location: ../index.php?error=".$validError);
  // error when not loggedin, displays error and relocates the user to index
}

?>
