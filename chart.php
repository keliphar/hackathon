<?php 
require_once('../connectDB.php');

// $stmt = $pdo -> prepare("SELECT COUNT(inv_id) from book_olahan where status =1 GROUP BY MONTH(tgl_dipesan)");
// $stmt -> execute();
// $result = $stmt -> fetchAll();

$stmt = $pdo -> prepare("SELECT COUNT('inv_id') as Jumlah, MONTH(tgl_dipesan) as Bulan from book_olahan where status =1 GROUP BY MONTH(tgl_dipesan)");
$stmt -> execute();
$data = $stmt -> fetchAll();

// foreach ($data as $key) {
//     echo $key["Jumlah"]." ";
// }

    

// Create an associative array to store counts for each month
$monthData = array_fill(1, 12, 0);

// Populate the monthData array with counts from the query result
foreach ($data as $row) {
    $month = intval($row['Bulan']);
    $count = intval($row['Jumlah']);
    $monthData[$month] = $count;
}

// foreach ($monthData as $row) {
//     echo $row." ";
// }

$jsonResult = json_encode($monthData);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>


<canvas id="canvas" width="600" height="300"></canvas>

<script>
    // Parse the JSON data
    var jsonData = <?php echo $jsonResult; ?>;
    
    var labels = Object.keys(jsonData); // Extract month numbers as labels
    var data = Object.values(jsonData); // Extract counts as data

    var ctx = document.getElementById('canvas').getContext('2d');
    var config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Graph Line',
                data: data,
                backgroundColor: 'rgba(0, 119, 204, 0.3)'
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    scaleLabel: {
                    display: true,
                    labelString: 'Bulan' // Label for the x-axis
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                    display: true,
                    labelString: 'Jumlah Pembelian' // Label for the y-axis
                    }
                }]
            }
        }
    };

    var myChart = new Chart(ctx, config);
</script>

<!-- <script>
    var labels = jsonResult.jsonarray.map(function(e) {
   return e.Bulan;
});
var data = jsonResult.jsonarray.map(function(e) {
   return e.Jumlah;
});


var ctx = canvas.getContext('2d');
var config = {
   type: 'line',
   data: {
      labels: labels,
      datasets: [{
         label: 'Graph Line',
         data: data,
         backgroundColor: 'rgba(0, 119, 204, 0.3)'
      }]
   }
}; -->
</script>
<!-- 
<script src="path/to/chartjs/dist/chart.umd.js"></script>
<script>
    const myChart = new Chart(ctx, {...});
</script> -->

<!-- <script>
    const month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']

    // Sample data for the chart
    const data = <?php //echo $jsonResult; ?>;
    console.log(data);

    // Get the canvas element
    const canvas = document.getElementById('myChart');

    // Get the 2D rendering context of the canvas
    const ctx = canvas.getContext('2d');

    const barColors = [
        'red', 'blue', 'green', 'orange',
        'purple', 'cyan', 'pink', 'yellow',
        'lightgreen', 'lightblue', 'lightcoral', 'lightsalmon'
    ];

    // Calculate the width of each bar and the total height of the chart
    const barWidth = canvas.width / data.length;
    const chartHeight = canvas.height - 40; // Leave space at the bottom for labels

    // Define the starting position for the first bar
    let x = 0;

    // Draw X and Y axes
    ctx.beginPath();
    ctx.moveTo(30, 0);
    ctx.lineTo(30, chartHeight);
    ctx.lineTo(canvas.width, chartHeight);
    ctx.strokeStyle = 'black';
    ctx.stroke();

    // Draw X-axis labels
    ctx.font = '12px Arial';
    ctx.fillStyle = 'black';
    for (let i = 0; i < data.length; i++) {
        // ctx.fillText('Label ' + (i + 1), x + 10, canvas.height - 10);
        ctx.fillText(month[i], x+50, canvas.height-10);
        x += barWidth;
    }

    // Draw Y-axis labels and grid lines
    ctx.textAlign = 'right';
    ctx.textBaseline = 'middle';
    ctx.fillStyle = 'black';
    const maxDataValue = Math.max(...data);
    const yAxisStep = chartHeight / maxDataValue;
    for (let i = 0; i <= maxDataValue; i++) {
        const yPos = chartHeight - i * yAxisStep;
        ctx.fillText(i, 20, yPos);
        ctx.beginPath();
        ctx.moveTo(30, yPos);
        ctx.lineTo(canvas.width, yPos);
        ctx.strokeStyle = '#ccc'; // Grid line color
        ctx.stroke();
    }

    // Draw the bars
    x = 0;
    for (let i = 0; i < data.length; i++) {
        const barHeight = data['Jumlah'][i] * yAxisStep;
        ctx.fillStyle = barColors[i];
        ctx.fillRect(x + 30, chartHeight - barHeight, barWidth - 10, barHeight);
        x += barWidth;
    }
</script> -->

<!-- <script>
    const month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    // Get the canvas element
    const canvas = document.getElementById('myChart');

    // Get the 2D rendering context of the canvas
    const ctx = canvas.getContext('2d');

    const barColors = [
        'red', 'blue', 'green', 'orange',
        'purple', 'cyan', 'pink', 'yellow',
        'lightgreen', 'lightblue', 'lightcoral', 'lightsalmon'
    ];

    // Calculate the width of each bar and the total height of the chart
    const barWidth = canvas.width / month.length;
    const chartHeight = canvas.height - 40; // Leave space at the bottom for labels

    // Define the starting position for the first bar
    let x = 0;

    // Draw X and Y axes
    ctx.beginPath();
    ctx.moveTo(30, 0);
    ctx.lineTo(30, chartHeight);
    ctx.lineTo(canvas.width, chartHeight);
    ctx.strokeStyle = 'black';
    ctx.stroke();

    // Draw X-axis labels
    ctx.font = '12px Arial';
    ctx.fillStyle = 'black';
    for (let i = 0; i < month.length; i++) {
        ctx.fillText(month[i], x + 10, canvas.height - 10);
        x += barWidth;
    }

    // Draw Y-axis labels and grid lines
    ctx.textAlign = 'right';
    ctx.textBaseline = 'middle';
    ctx.fillStyle = 'black';

    // Use AJAX to fetch data from the server
    // fetch('connectDB.php')
    //         .then(response => response.json())
    //         .then(data => {
    //             // Draw the bars
    //             x = 0;
    //             for (let i = 1; i <= 12; i++) {
    //                 const barHeight = data[i] * yAxisStep; // Access data using the month index
    //                 ctx.fillStyle = barColors[i - 1]; // Adjust index to match colors array
    //                 ctx.fillRect(x + 30, chartHeight - barHeight, barWidth - 10, barHeight);
    //                 x += barWidth;
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error fetching data:', error);
    //         });
    const data = <?php //echo json_decode($jsonResult);?>
    x = 0;
    for (let i = 1; i <= 12; i++) {
        const barHeight = phpData[i] * 10; // Adjust multiplier as needed
        ctx.fillStyle = barColors[i - 1]; // Adjust index to match colors array
        ctx.fillRect(x + 30, chartHeight - barHeight, barWidth - 10, barHeight);
        x += barWidth;
    }
</script> -->

