<?php
include "../Model/session.php";
include 'header.php';
include 'navbar.php';
//include '../Controller/JQueryMobile.php';
include '../Controller/getimpTemperature.php';

//include '../Controller/getLastimpTemperature.php';
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


<body>
<div class="container text-center jumbotron mt-5">
	<h1>Block 3</h1><br>
	<h1>On/Off Toggle lights</h1>
  <a href=" https://agent.electricimp.com/XmoU-yWjhw1R?pin=5&state=1"><button class="btn btn-danger mt-1">Switch Red on</button></a>
  <a href=" https://agent.electricimp.com/XmoU-yWjhw1R?pin=5&state=0"><button class="btn btn-outline-danger mt-1">Switch Red off</button></a><br>
  <a href=" https://agent.electricimp.com/XmoU-yWjhw1R?pin=7&state=1"><button class="btn btn-success mt-1">Switch Green on</button></a>
  <a href=" https://agent.electricimp.com/XmoU-yWjhw1R?pin=7&state=0"><button class="btn btn-outline-success mt-1">Switch Green off</button></a><br>
	<a href=" https://mayar.abertay.ac.uk/~g510572/cmp306/cameras/index.html"><button class="btn btn-primary mt-1">Link To Imp(ID: 14)</button></a>

</div>


<div class="container text-center width="400" height="200" mt-1">
	<!-- https://www.chartjs.org/ -->
	<h4>Pin Temperatures</h4>
	<canvas id="chart" width="400" height="200"></canvas>


	<script>

	var ctx = document.getElementById('chart').getContext('2d');
	var xlabels = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12];//time at bottom of chart
	var pin8Data = [29,33,34,35,39,35,30,29,29,32,36,34]; //pin 8 data
	var pin9Data = [29,29,29,32,36,34,32,33,34,35,39,35]; //pin 9 data



	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: xlabels,//time 12hrs
			datasets: [{
				label: 'Internal Temp',
				data: pin8Data,
				fill: false,
				borderColor: ['rgba(255, 99, 132, 1)'],
				borderWidth: 1
			},
			{
				label: 'External Temp',
				data: pin9Data,
				fill: false,
				borderColor: ['rgba(54, 162, 235, 1)'],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	</script>
</div>

<div class="container text-center jumbotron mt-1">
	<h4>Last 12 Temperature Readings</h4>
<table class="table table-dark">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Date & Time</th>
			<th scope="col">Internal Temperature</th>
			<th scope="col">External Temperature</th>
		</tr>
	</thead>
	<tbody>
		<?php
		for ($i=0 ; $i < sizeof($impArray) ; $i++)
			{
			echo "<tr>";
			echo "<th scope='row'></th>";
				echo "<td>".$impArray[$i]->dttm."</td>";
				echo "<td>".substr($impArray[$i]->message,14,2)."</td>";
				echo "<td>".substr($impArray[$i]->message,47,2)."</td>";
			echo "</tr>";
			}
		?>
	</tbody>
</table>
</div>

</body>
<?php
include 'footer.php';
?>
</html>
