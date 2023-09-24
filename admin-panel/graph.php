<?php 
require_once('./connectDB.php');
$stmt = $pdo -> prepare("SELECT COUNT('inv_id') as Jumlah from book_olahan where status =1 GROUP BY MONTH(tgl_dipesan)");
$stmt -> execute();
$data = $stmt -> fetchAll();

foreach ($data as $key) {
    echo $key["Jumlah"]." ";
}
?>
<div class="vh-100">
    <canvas id="myChart" width="400" height="200"></canvas>
</div>
<script>
        // Sample data for the chart
        const data = [12, 8, 19, 3, 10];
        // Get the canvas element
        const canvas = document.getElementById('myChart');

        // Get the 2D rendering context of the canvas
        const ctx = canvas.getContext('2d');

        // Define the colors for the bars
        const barColors = ['red', 'blue', 'green', 'orange', 'purple'];

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
            ctx.fillText('Label ' + (i + 1), x + 10, canvas.height - 10);
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
            const barHeight = data[i] * yAxisStep;
            ctx.fillStyle = barColors[i];
            ctx.fillRect(x + 30, chartHeight - barHeight, barWidth - 10, barHeight);
            x += barWidth;
        }
</script>