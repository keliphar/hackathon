<?php
    require_once "connectDB.php";

    $target_dir = "bukti_trf_durian/";
    $target_file = $target_dir . basename($_FILES["imgTrf"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgTrf"]["tmp_name"]);
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        echo "<script>alert('Mohon upload file JPG, JPEG, atau PNG'); window.location.replace('pesan.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    } else if ($_FILES["imgTrf"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        echo "<script>alert('File terlalu besar'); window.location.replace('pesan.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Pemesanan gagal, silahkan coba lagi'); window.location.replace('pesan.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        // } else if (move_uploaded_file($_FILES["imgTrf"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["imgTrf"]["name"])). " has been uploaded.";
            // } else {
                // echo "Sorry, there was an error uploading your file.";
    }
    // $tgl = $_GET['tgl'];
    $stmt = $pdo->query("SELECT * FROM book_durian");
    $id = ($stmt->rowCount()) + 1;
    $inv_id = 'INV' . date("Ymd") . $id;
    $tgl = date("Y-m-d");
    $_FILES["imgTrf"]["tmp_name"] = $inv_id;
    $target_file = $target_dir . basename($_FILES["imgTrf"]["name"]);

    // echo $inv_id . " " . $tgl;
    // if()
    $query = "INSERT INTO book_durian VALUES('{$inv_id}', '{$tgl}', now(), '{$_POST['nama']}', '{$_POST['nowa']}', '{$_POST['kecil']}', '{$_POST['sedang']}', '{$_POST['besar']}', '{$target_file}', 0)";
    echo $query;
    $stmt = $pdo->query($query);

    $query = "SELECT * FROM stok_durian WHERE tanggal='{$_POST['jadwal']}'";
    $stmt = $pdo->query($query);
    $data['kecil'] = 0;
    $data['sedang'] = 0;
    $data['besar'] = 0;
    if ($stmt->rowCount() != 0) {
        $data = $stmt->fetch();
        // echo $data;
        // echo '<option value="sesi1">Sesi 1 (10:00)</option>';
    }
    $kecil = $data['kecil'] - $_POST['kecil'];
    $sedang = $data['sedang'] - $_POST['sedang'];
    $besar = $data['besar'] - $_POST['besar'];
    $query = "UPDATE stok_durian SET kecil = {$kecil}, sedang = {$sedang}, besar = {$besar} WHERE tanggal='{$_POST['jadwal']}'";
    echo $query;
    $stmt = $pdo->query($query);
    // $stmt = $pdo->query("SELECT * FROM book_olahan WHERE tgl_dipesan=$tgl AND sesi = 1 AND status != 2");
    // if ($stmt->rowCount() == 0) {
        // echo '<option value="sesi1">Sesi 1 (10:00)</option>';
    // }
    echo move_uploaded_file($_FILES["imgTrf"]["tmp_name"], $target_file);
    
    echo "<script>alert('Pemesanan Berhasil! Silahkan menunggu konfirmasi dari admin');</script>";
    // echo "<script>alert('Pemesanan Berhasil! Silahkan menunggu konfirmasi dari admin'); window.location.replace('pesan.php')</script>";

    // $targetFile = $target_dir . basename($_FILES["imgTrf"]["name"]);
    // echo $targetFile;
    // echo htmlspecialchars( basename( $_FILES["imgTrf"]["name"]));
    // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)


    // $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
?>