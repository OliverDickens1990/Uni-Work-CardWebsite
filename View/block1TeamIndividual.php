<?php
/*
Description: individual team page displaing data and articles.
Author: Oliver Dickens
*/
include "../Model/session.php";
include 'header.php';
include 'navbar.php';
include '../Controller/getTeamByID.php';
?>
<html>
<body>
  <div class="container text-center mt-2 pt-5">
    <div class="row">

      <div class="teamBox col-12 mt-2">
        <div class="col-6 teamIdentity">
          <div class="teamCard">
            <h3>Founded In:</h3>
            <?php echo "<h1 class='clubFounded'>".$teamArray->clubFounded."";?>
              <div class="card-body">
                <h3>Country Plays in:</h3>
                <?php echo "<h1 class='country'>".$teamArray->country."";?>
                  <h3>League:</h3>
                  <?php echo "<h1 class='clubFounded'>".$teamArray->division."";?>
                  </div>
                </div>
              </div>
              <div class="col-6 teamIdentity">
                <div class="teamCard">
                  <?php echo "<img src='".$teamArray->teamImage."'  alt='".$teamArray->teamID.">"; ?>
                  <div class="card-body">
                    <?php echo "<h1 class='teamName'>".$teamArray->teamName."";?>
                      <?php echo "<a class='btn btn-outline-primary btn-block mt-2 mb-2' href=".$teamArray->officialLinks.">Official Page</a>"; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="teamBox col-12 mt-2">
                <div class="teamStadium col-12 mt-2">
                  <div class="col-6">
                    <?php echo "<img src='".$teamArray->stadiumImage."'  alt='".$teamArray->teamID.">"; ?>
                  </div>
                </div>

                <div class="teamDescription col-12">
                  <div class="col-6">
                    <?php echo "<h5 class='description'>".$teamArray->description."<br>";?>
                    </div>
                  </div>
                </div>

                <div class="teamBox col-12">
                  <?php
                  for ($i=0 ; $i < sizeof($teamArray) ; $i++)
                  {
                  echo "<div class='card col-6' style='width: 18rem'>";
                  echo "<img src='".$teamArray->articleImage."'  alt='".$teamArray->teamID.">";
                  echo "<h5 class='card-title'>Article</h5>";
                  echo "<h4 class='card-subtitle mb-2 text-muted'>".$teamArray->articleTitle."</h6>";
                  echo "<p class='description'>".$teamArray->article."<br>";
                  echo "<a class='btn btn-outline-primary btn-block mt-2 mb-2' href=".$teamArray->articleLink.">Article Link</a>";
                  echo "</div>";
                }
                ?>
                </div>
              </div>
            </div>
          </body>
          <footer>
            <?php
            include 'footer.php';
            ?>
          </footer>
          </html>
