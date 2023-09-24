<?php
    require_once "connectDB.php";
    $tgl = $_GET['tgl'];
    $stmt = $pdo->query("SELECT * FROM book_olahan WHERE tgl_dipesan=$tgl AND sesi = 1 AND status != 2");
    if ($stmt->rowCount() == 0) {
        echo '<option value="1">Sesi 1 (10:00)</option>';
    }
    
    $stmt = $pdo->query("SELECT * FROM book_olahan WHERE tgl_dipesan=$tgl AND sesi = 2 AND status != 2");
    if ($stmt->rowCount() == 0) {
        echo '<option value="2">Sesi 2 (12:00)</option>';
    }
    
    $stmt = $pdo->query("SELECT * FROM book_olahan WHERE tgl_dipesan=$tgl AND sesi = 3 AND status != 2");
    if ($stmt->rowCount() == 0) {
        echo '<option value="3">Sesi 3 (14:00)</option>';
    }
?>