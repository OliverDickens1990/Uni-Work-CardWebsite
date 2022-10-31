
<nav class="navbar d-flex d-inline no-gutters row">
  <div class ="col-2" id="top">
    <a class="btn logo">Course Work<i class="fas fa-angle-double-right"></i></a>
  </div>
  <div class="col row no-gutters justify-content-center">
    <form class="form-inline col-10">
      <input type="button" class="btn btn-primary" value="Back" onclick="history.back(-1)" />
      <input type="button" class="btn btn-primary" value="Forward" onclick="history.forward(+1)" />
    </form>
    <?php
    if(!isset($_SESSION['username']))
    {
    echo  "<form class='form-inline col-1'>";
      echo  "<a href='registerSignInPage.php' class='nav-link'>";
        echo  "<div class='fa-secondary fa-lg'>";
      echo  "<span class='link-text'>Sign-In</span>";
      echo  "</div>";
    echo  "</a>";
    echo  "</form>";
    }
    else
    {
      echo  "<form class='form-inline col-1'>";
        echo  "<div class='fa-secondary fa-lg'>";
        echo  "<span class='link-text'>".$_SESSION['username']."</span>";
        echo  "</div>";
      echo  "</form>";

      echo  "<form class='form-inline col-1'>";
      echo  "<a href='../Controller/logout.php' class='nav-link'>";
          echo  "<div class='fa-secondary fa-lg'>";
        echo  "<span class='link-text'>Logout</span>";
        echo  "</div>";
        echo  "</a>";
      echo  "</form>";
    }
     ?>
  </div>

  <div class="sidebar row no-gutters justify-content-center" id="sidebar">
    <ul class="list-group col-2">
    <li class="list-group-item">
      <a href="block1.php" class="nav-link">
        <div class="fa-secondary fa-lg">
          <i class="fas fa-th-large fa-lg"></i>
          <span class="link-text">Block 1</span>
        </div>
      </a>
    </li>
    <li class="list-group-item">
      <a href="block2.php" class="nav-link">
        <div class="fa-secondary fa-lg">
          <i class="fas fa-th-large fa-lg"></i>
          <span class="link-text">Block 2</span>
        </div>
      </a>
    </li>
    <li class="list-group-item">
      <a href="block3.php" class="nav-link">
        <div class="fa-secondary fa-lg">
          <i class="fas fa-th-large fa-lg"></i>
          <span class="link-text">Block 3</span>
        </div>
      </a>
    </li>
    <li class="list-group-item">
      <a href="block4.php" class="nav-link">
        <div class="fa-secondary fa-lg">
          <i class="fas fa-th-large fa-lg"></i>
          <span class="link-text">Block 4</span>
        </div>
      </a>
    </li>
    <li class="list-group-item">
      <a href="comments.php" class="nav-link">
        <div class="fa-secondary fa-lg">
          <i class="fas fa-th-large fa-lg"></i>
          <span class="link-text">Comments</span>
        </div>
      </a>
    </li>

</ul>
</div>
</nav>
