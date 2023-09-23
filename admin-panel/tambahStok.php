<?php
    require_once "../connectDB.php";

    // $gold = "SELECT  FROM peserta WHERE nama_tim = '{$_POST['nama']}'";
    // $result = mysqli_query($conn, $gold);
    // $gold = mysqli_fetch_assoc($result)['gold'] + $_POST['gold'];
    // $query = "UPDATE book_olahan SET status = true WHERE inv_id = '{}'";
    // $result = mysqli_query($conn, $query);
    $tgl = $_POST['tgl'];
    // echo $_POST['inv_id'];
    // echo $_POST['konfirmasi'];
    // if($_POST['konfirmasi'] == 'berhasil')
        // $status = 1;
    // echo $status;
    $query = "SELECT * FROM stok_durian WHERE tanggal = {$tgl}";
    $stmt = $pdo->query($query);
    if ($stmt->rowCount() == 0) {
        if($_POST['besar'] != 0 || $_POST['sedang'] != 0  || $_POST['kecil'] != 0)
            $query = "INSERT INTO stok_durian VALUES({$tgl}, {$_POST['kecil']}, {$_POST['sedang']}, {$_POST['besar']})";
        else $query = "";
        // echo '<li class="list-group-item">Sesi 1: Available</li>';
    } else {
        $data = $stmt->fetch();
        $kecil = $data['kecil'] + $_POST['kecil'];
        $sedang = $data['sedang'] + $_POST['sedang'];
        $besar = $data['besar'] + $_POST['besar'];
        $query = "UPDATE stok_durian SET kecil = {$kecil}, sedang = {$sedang}, Besar = {$besar} WHERE tanggal = {$tgl}";
        // $sesi1 = $stmt->fetch();
        // echo '<li class="list-group-item">Sesi 1: Not Available</li>';
    }
    if($query != "")
    // echo $query;
        $stmt = $pdo->query($query);
    // $stmt->execute($_POST['inv_id']);
    // $data = $stmt->fetch();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>