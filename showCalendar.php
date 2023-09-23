<?php
    $bln = $_GET['bln'];
    $thn = $_GET['thn'];

    $lastDate = strtotime('last day of ' . $bln . ' ' . $thn);
    $lastDate = date('d', $lastDate);
    $prevMonth = strtotime('last day of ' . $bln . ' ' . $thn . ' previous month');
    $day = date("D", $prevMonth);
    $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    $prevMonth = date("d", $prevMonth);
    $ctr = array_search($day, $days);
    $ctr = ($ctr + 1) % 7;
    echo '<div class="row">';
    for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
        echo '<div class="col">';
        echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
        echo '</div>';
    }
    for($i = 1; $i <= $lastDate; $i++) {
        if($ctr % 7 == 0) {
            if($ctr > 0)
                echo '</div>';
            echo '<div class="row">';
        }
        $ctr++;
        echo '<div class="col">';
        echo '<button type="button" class="btn custom-button" onclick="showBook(this)">' . $i . '</button>';
        echo '</div>';
    }
    for($i = 1; $ctr % 7 != 0; $i++) {
        $ctr++;
        echo '<div class="col">';
        echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>