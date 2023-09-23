<?php
    require_once "../connectDB.php";

    // $gold = "SELECT  FROM peserta WHERE nama_tim = '{$_POST['nama']}'";
    // $result = mysqli_query($conn, $gold);
    // $gold = mysqli_fetch_assoc($result)['gold'] + $_POST['gold'];
    // $query = "UPDATE book_olahan SET status = true WHERE inv_id = '{}'";
    // $result = mysqli_query($conn, $query);
    // $status = 2;
    // echo $_POST['inv_id'];
    // echo $_POST['konfirmasi'];
    // if($_POST['konfirmasi'] == 'berhasil')
        // $status = 1;
    // echo $status;
    $stmt = $pdo->query("UPDATE stok_durian SET kecil = {$_POST['kecil']}, sedang = {$_POST['sedang']}, besar = {$_POST['besar']} WHERE tanggal = '{$_POST['tgl']}'");
    // $stmt->execute($_POST['inv_id']);
    // $data = $stmt->fetch();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>