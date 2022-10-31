<?php
include "../Model/session.php";
include 'header.php';
include 'navbar.php';


if(isset($_SESSION['UserLoggedIn']))
{
      echo "<body>
      <div class='container text-center mt-2 mb-2 pt-5 pb-5 '>



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
