<?php
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
    // $stmt = $pdo->query("SELECT * FROM book_olahan");
    // $id = ($stmt->rowCount()) + 1;
    $inv_id = date("Ymd") + $id;
    $tgl = date("Y-m-d");

    // echo $inv_id . " " . $tgl;

    // $query = "INSERT INTO book_olahan VALUES("'{$nv_id}'", "'{$tgl}'", '2023-09-30', 1, 'Rara', '0810213', 'trf', 0)";
    echo $query;
    // $stmt = $pdo->query("SELECT * FROM book_olahan WHERE tgl_dipesan=$tgl AND sesi = 1 AND status != 2");
    // if ($stmt->rowCount() == 0) {
        // echo '<option value="sesi1">Sesi 1 (10:00)</option>';
    // }
    echo "<script>alert('Pemesanan Berhasil! Silahkan menunggu konfirmasi dari admin')</script>";
    $targetFile = $targetDir . basename($_FILES["imgTrf"]["name"]);
    move_uploaded_file($_FILES["imgTrf"]["tmp_name"], $targetFile)
?>






<?php
$targetDir = "uploads/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
