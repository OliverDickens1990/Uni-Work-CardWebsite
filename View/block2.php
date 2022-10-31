
<?php
/*
Description: card display teams page.
Author: Oliver Dickens
*/
include "../Model/session.php";
include 'header.php';
include 'navbar.php';
include '../Controller/getAllQuestions.php';
//include '../Controller/getAllAnswers.php';
?>
<html>
<body>
  <div class="container text-center mt-2 pt-5">
      <div class='row'>
        <div class='col-12 mt-5'>
          <h1>Block 2 Questions </h1>
        </div>
      </div>
      <?php
          if(!isset($_SESSION['UserLoggedIn']))
          {
            echo "<h4>Sign In to add/alter Questions</h4>";
            for ($i=0 ; $i < sizeof($questionArray ) ; $i++)
            {
            echo "<ul class='list-group mt-5'>";
            echo "<li class='list-group-item'>Question: ".$questionArray[$i]->question."</li>";
            echo "</ul>";
            }
          }
          elseif(isset($_SESSION['UserLoggedIn']))
          {
            echo "<h4>".$_SESSION['username']."</h4>";
            echo "<div class='col-12 row mt-5'>";
            echo "<div class='col-12'>";
            echo "<a class='btn btn-primary' href='questionCreate.php'>Add Question</a>";
            echo "</div>";
            echo "</div>";
            for ($i=0 ; $i < sizeof($questionArray) ; $i++)
            {
            echo "<ul class='list-group mt-5'>";
            echo "<li class='list-group-item'>Question: ".$questionArray[$i]->question."</li>";
            echo "<li class='list-group-item'>Answer: ".$answerArray[$i]->answer."</li>";
            echo "<div class='col-12 row mt-5'>";
            echo "<div class='col-4'>";
            echo "<a class='btn btn-primary' href='#'>Add Answer</a>";
            echo "</div>";
            echo "<div class='col-4'>";
            echo "<a class='btn btn-warning' href='questionUpdate.php'>Alter Question</a>";
            echo "</div>";
            echo "<div class='col-4'>";
            echo "<a class='btn btn-danger' href='#'>Remove Question</a>";
            echo "</div>";
            echo "</div>";

            echo "</ul>";
            }
          }
      ?>
</body>
<?php
include 'footer.php';
?>
</html>
