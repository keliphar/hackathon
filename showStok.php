<?php
    require_once "connectDB.php";
    $tgl = $_GET['tgl'];
    $stmt = $pdo->query("SELECT * FROM stok_durian WHERE tanggal=$tgl");
    if ($stmt->rowCount() == 0) {
        echo '<li class="list-group-item">Kecil: 0 (10-15 ribu)</li>';
        echo '<li class="list-group-item">Sedang: 0 (20-35 ribu)</li>';
        echo '<li class="list-group-item">Besar: 0 (35-50 ribu)</li>';
    } else {
        $stok = $stmt->fetch();
        echo '<li class="list-group-item">Kecil: ' . $stok['kecil'] . ' </li>';
        echo '<li class="list-group-item">Sedang: ' . $stok['sedang'] . ' </li>';
        echo '<li class="list-group-item">Besar: ' . $stok['besar'] . ' </li>';
    }
    // $stmt = $pdo->query("SELECT * FROM olahan");
    // while($data = $stmt->fetch()) {
        // echo '<option value="' . $data['nama'] . '">' . $data['nama'] . '</option>';
    // }
?>