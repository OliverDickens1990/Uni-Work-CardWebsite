<?php
/*
Description: card display teams page.
Author: Oliver Dickens
*/
include "../Model/session.php";
include 'header.php';
include 'navbar.php';
include '../Controller/getAllTeams.php';
?>
<body>
    <div class="container text-center mt-2 pt-5">
      <h1>Block 1</h1>
      <h1>Top Teams Around the World</h1>
      <h5>Click on any image to see more on that team.</h5><hr>
      <?php
      // ref: https://stackoverflow.com/questions/36622437/display-row-information-from-sql-table-using-php-and-bootsrap
        $rows = 0;
        $cols = 4;
        $counter = 1;
        $nbsp = $cols - ($rows % $cols);
        for ($i=0 ; $i < sizeof($teamArray) ; $i++)
        {
          if(($counter % $cols) == 1) // Check if it's new row
          {
            echo '<div class="row">';
          }
          echo "<div class='col'>"; // open col
          echo "<div class='card'>"; // Open card div
          echo "<div class='images' >"; // Open club image
          echo "<a href='block1TeamIndividual.php?id=".$teamArray[$i]->teamID."'> <img src='".$teamArray[$i]->teamImage."'  alt='".$teamArray[$i]->teamID."></a>"; // card image
          echo "</div>";// close club image
          echo "<div class='card-bottom'>";
          echo "<h5 class='teamTitle mt-2'>".$teamArray[$i]->teamName."<br>";
          echo "</div>";// close card-bottom
          echo "</div>";// close card
          echo "</div>";// close col

          if(($counter % $cols) == 0) // If it's last column in each row then counter remainder will be zero
          {
            echo '</div>';
          }
          $counter++;
        }

        if($nbsp > 0)
        {
          for ($i = 0; $i < $nbsp; $i++)
          {
            echo'<div class="col">&nbsp;</div>';
          }
        }
        echo '</div></div><br>';
      ?>

<?php
include 'footer.php';
?>

</body>
