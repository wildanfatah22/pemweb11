<?php
include 'koneksi.php';
$covid = mysqli_query($conn,"SELECT * FROM covid");
while ($row = mysqli_fetch_array($covid)) {
	$negara[] = $row['negara'];

	$sql = mysqli_query($conn, "SELECT SUM(totcase) AS totalcase FROM covid WHERE id='".$row['id']."'");
	$row = $sql->fetch_array();
	$totcase[] = $row['totalcase'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Grafik Menggunakan Chart JS</title>
    <script type="text/javascript" src="chart.js"></script>
    
</head>
<body>
    <div style="width: 800px; height: 800px">
        <canvas id="myChart"></canvas> 
    </div>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data : {
                labels: <?php echo json_encode($negara); ?>,
                datasets: [{
                    label: 'Grafik Total Covid Case',
                    data:  <?php echo json_encode($totcase); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>