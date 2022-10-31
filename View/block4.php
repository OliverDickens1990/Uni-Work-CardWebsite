<?php
include "../Model/session.php";
include 'header.php';
include 'navbar.php';
?>

<body>
<div class="container text-center jumbotron mt-5">
	<h1>Block 4</h1><br>
	<h4>RSS Feed</h4>
</div>
<!-- 3 cards, 1st to be a rss feed  to items or questions-->
<div class = "container">
	<div class = "row">
		<div class = "col-4">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="../View/images/rss-feed.png" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">RSS Feed</h5>
			    <a href="Block4/articlesRSSFeed.php" class="btn btn-primary">Go to RSS Feed</a>
			  </div>
			</div>
		</div>

		<div class = "col-4">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="../View/images/weather.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Weather Forecast</h5>
			    <a href="Block4/weatherForcast.php" class="btn btn-primary">Go</a>
			  </div>
			</div>
		</div>

		<div class = "col-4">
			<div class="card" style="width: 18rem ;">
			  <img class="card-img-top" src="../View/images/rest.png" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Rest Web Services</h5>
			    <a href="../View/Block4/rest.php" class="btn btn-primary">Rest Web Services</a>
			  </div>
			</div>
		</div>

	</div>
</div>
</body>
<?php
include 'footer.php';
?>
</html>
