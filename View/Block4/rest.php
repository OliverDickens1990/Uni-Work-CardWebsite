
<?php
/*
Description: the rest page to call questions.
Author: Oliver Dickens
*/
include "../../Model/session.php";
include '../header.php';
include '../navbar.php';
include "../../Model/get_all_questions.php";
?>
<html>
<body>
  <div class="container text-center mt-2 pt-5">
      <div class='row'>
        <div class='col-12 mt-5'>
          <h1>Questions in Rest Form</h1>
          <?php
                for ($i=0; $i < sizeof($questionArray); $i++)
                {
                echo "<ul class='list-group mt-5'>";
                echo "<li class='list-group-item'>Question: ".$questionArray[$i]->question."</li>";
                echo "<li class='list-group-item'>Question: ".$questionArray[$i]->questionID."</li>";
                echo "</ul>";
                }
          ?>
        </div>
      </div>

    </div>
</body>
<?php
include 'footer.php';
?>
</html>
