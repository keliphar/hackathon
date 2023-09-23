<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style-kalender.css">
    <script src="script-kalender.js"></script>
</head>
<body>
    <?php
        echo '<div class="calendar" id="calendar">';
        //kalender header
        echo '<div class="calendar-header">';
        echo '<span class="year" id="tahun">';
        echo '2023';
        echo '</span>';
        echo '<div class="month-picker">';
        echo '<button type="button" class="btn btn-no-outline" onclick="updateCalendar(' . "'Left'" . ')"><</button>';
        echo '<span id="bulan">September</span>';
        echo '<button type="button" class="btn btn-no-outline" onclick="updateCalendar(' . "'Right'" . ')">></button>';
        echo '</div>';
        echo '</div>';
        //batas kalender header
        $ctr = array_search($day, $days);
        //kalender body
        echo '<div class="calendar-body" id="kalender">';
        echo '<div class="calendar-week-day">';
        echo '<div>Sun</div>';
        echo '<div>Mon</div>';
        echo '<div>Tue</div>';
        echo '<div>Wed</div>';
        echo '<div>Thu</div>';
        echo '<div>Fri</div>';
        echo '<div>Sat</div>';
        echo '</div>';
        echo '<div class="calendar-day">';
        for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
            $ctr++;  
            echo '<div>';
            echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
            echo '</div>';
        }
        for($i = 1; $i <= $lastDate; $i++) {
            $ctr++;  
            echo '<div>';
            echo '<button type="button" class="btn custom-button" onclick="showBook(this)">' . $i . '</button>';
            echo '</div>';
        }
        for($i = 1; $ctr % 7 != 0; $i++) {
            $ctr++;
            echo '<div>';
            echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
            echo '</div>';
        }
        echo '</div>'; #close calender body
        echo '</div>';  #close calender
        // echo '</body>'; #light
        echo '</div>'; #close col
        echo '</div>';
        echo '<div class="col" id="sesiOlahan">';
        echo '</div>';
    ?>
</body>
</html>