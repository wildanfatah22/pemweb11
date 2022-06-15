<?php
include('koneksi.php'); // Akses ke database
//total kasus
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$country_name[] = $row['negara'];
	// Mengambil data newcases pada tb_covid19 
	$query = mysqli_query($conn,"SELECT totcase FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$total_cases[] = $row['totcase'];
}
//kasus terbaru
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT newcases FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$active_cases[] = $row['newcases'];
}
// total kematian 
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){	
	$query = mysqli_query($conn,"SELECT totaldeaths FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$totaldeaths[] = $row['totaldeaths'];
}
// kematian terbaru 
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT newdeaths FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$newdeaths[] = $row['newdeaths'];
}
// total recovery
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){
	$query = mysqli_query($conn,"SELECT totalrecovered FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$totalrecovered[] = $row['totalrecovered'];
}
// recovery terbaru
$negara = mysqli_query($conn, "SELECT * FROM tb_covid19");
while($row = mysqli_fetch_array($negara)){	
	$query = mysqli_query($conn,"SELECT newrecovered FROM tb_covid19 WHERE id='".$row['id']."'");
	$row = $query->fetch_array();
	$recovered[] = $row['newrecovered'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
        <canvas id="myChart2"></canvas>
        <canvas id="myChart3"></canvas>
        <canvas id="myChart4"></canvas>
        <canvas id="myChart5"></canvas>
        <canvas id="myChart6"></canvas>
    </div>
    <script>


        // total kasus
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik Total Cases COVID-19',
                    data: <?php echo json_encode($total_cases); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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


        // kasus terbaru 
        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik New Cases COVID-19',
                    data: <?php echo json_encode($active_cases); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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



        // total kematian 
        var ctx3 = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik Total Deaths COVID-19',
                    data: <?php echo json_encode($totaldeaths); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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


        // kematian terbaru grafik 
        var ctx4 = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik New Deaths COVID-19',
                    data: <?php echo json_encode($newdeaths); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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


        // total rekoveri 
        var ctx5 = document.getElementById("myChart5").getContext('2d');
        var myChart = new Chart(ctx5, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik Total Recovered COVID-19',
                    data: <?php echo json_encode($totalrecovered); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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


        // penyembuhan terbaru grafik 
        var ctx6 = document.getElementById("myChart6").getContext('2d');
        var myChart = new Chart(ctx6, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($country_name); ?>,
                datasets: [{
                    label: 'Grafik New Recovered COVID-19',
                    data: <?php echo json_encode($recovered); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
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
</body>
</html>
