<?php
include('koneksi.php'); // Akses ke database 
// total kasus
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while ($row = mysqli_fetch_array($negara)) {
    $country_name[] = $row['negara'];
    // Mengambil data total deaths pada tb_covid19 
    $query = mysqli_query($conn, "SELECT totcase FROM tb_covid19 WHERE id='" . $row['id'] . "'");
    $row = $query->fetch_array();
    $total_cases[] = $row['totcase'];
}
// kasus terbaru
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT newcases FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$active_cases[] = $row['newcases'];
}
// total death 
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT totaldeaths FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$totaldeath[] = $row['totaldeaths'];
}
// new death
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT newdeaths FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$newdeaths[] = $row['newdeaths'];
}
// total recovered 
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT totalrecovered FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$totalrecovered[] = $row['totalrecovered'];
}
// new recovered
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT newrecovered FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$newrecovered[] = $row['newrecovered'];
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Doughnut Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<center>
<body>
	<div id="canvas-holder" style="width:50%">
        <h1>Total Kasus</h1>
		<canvas id="chart-area"></canvas>
        <h1>Covid Terbaru</h1>
		<canvas id="chart-area2"></canvas>
		<h1>Kematian terbaru</h1>
		<canvas id="chart-area3"></canvas>
		<h1>New recovered </h1>
		<canvas id="chart-area4"></canvas>
		<h1>Total death</h1>
		<canvas id="chart-area5"></canvas>
		<h1>Total recovered</h1>
		<canvas id="chart-area6"></canvas>
	</div>
	<script>

        //total case
        var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					label: 'Grafik Total Kasus COVID-19',
					data:<?php echo json_encode($total_cases); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase Total Cases COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
		};
        
        //new case
		var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					label: 'Grafik Kasus terbaru COVID-19',
					data:<?php echo json_encode($active_cases); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase New Cases COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
		};
		// total deaths
		var config3 = {
            type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($totaldeath); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase Total Deaths COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
			
		};
        // new deaths
		var config4 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($newdeaths); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase New Deaths COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
		};
        //total recovered
		var config5 = {
            type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($totalrecovered); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase Total Recovered COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
		};
        //new recovered
		var config6 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($newrecovered); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase New Recovered COVID-19'
				}],
				labels: <?php echo json_encode($country_name); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			var ctx2 = document.getElementById('chart-area2').getContext('2d');
			var ctx3 = document.getElementById('chart-area3').getContext('2d');
			var ctx4 = document.getElementById('chart-area4').getContext('2d');
			var ctx5 = document.getElementById('chart-area5').getContext('2d');
            var ctx6 = document.getElementById('chart-area6').getContext('2d');
			window.myPie = new Chart(ctx, config);
			window.myPie2 = new Chart(ctx2, config2);
			window.myPie3 = new Chart(ctx3, config3);
			window.myPie4 = new Chart(ctx4, config4);
			window.myPie5 = new Chart(ctx5, config5);
            window.myPie6 = new Chart(ctx6, config6);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();
            window.myPie6.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();
            window.myPie6.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();
            window.myPie6.update();

		});
	</script>
</body></center>
</html>