<?php
    require_once "connectDB.php";

    $target_dir = "bukti_trf/";
    $target_file = $target_dir . basename($_FILES["imgTrf"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgTrf"]["tmp_name"]);
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        echo "<script>alert('Mohon upload file JPG, JPEG, atau PNG'); window.location.replace('dapur-durian.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    } else if ($_FILES["imgTrf"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        echo "<script>alert('File terlalu besar'); window.location.replace('dapur-durian.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Pemesanan gagal'); window.location.replace('dapur-durian.php')</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        // } else if (move_uploaded_file($_FILES["imgTrf"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["imgTrf"]["name"])). " has been uploaded.";
            // } else {
                // echo "Sorry, there was an error uploading your file.";
    }
    // $tgl = $_GET['tgl'];
    $stmt = $pdo->query("SELECT * FROM book_olahan");
    $id = ($stmt->rowCount()) + 1;
    $inv_id = 'INV' . date("Ymd") . $id;
    $tgl = date("Y-m-d");

    // echo $inv_id . " " . $tgl;

    $query = "INSERT INTO book_olahan VALUES('{$inv_id}', '{$tgl}', '{$_POST['jadwal']}', {$_POST['pilihSesi']}, '{$_POST['pilihOlahan']}', '{$_POST['nama']}', {$_POST['nowa']}, {$_POST['orang']}, '{$target_file}', 0)";
    // echo $query;
    $stmt = $pdo->query($query);
    // if ($stmt->rowCount() == 0) {
        // echo '<option value="sesi1">Sesi 1 (10:00)</option>';
    // }
    $targetFile = $target_dir . basename($_FILES["imgTrf"]["name"]);
    // echo $targetFile;
    move_uploaded_file($_FILES["imgTrf"]["tmp_name"], $targetFile);
    echo "<script>alert('Pemesanan Berhasil! Silahkan menunggu konfirmasi dari admin'); window.location.replace('dapur-durian.php')</script>";
    // echo htmlspecialchars( basename( $_FILES["imgTrf"]["name"]));
    // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)
?>