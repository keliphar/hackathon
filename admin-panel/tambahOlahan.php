<?php
    require_once "../connectDB.php";

    $target_dir = "foto_olahan/";
    $target_file = $target_dir . basename($_FILES["inputFoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["inputFoto"]["tmp_name"]);
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        echo "<script>alert('Mohon upload file JPG, JPEG, atau PNG');</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    } else if ($_FILES["inputFoto"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        echo "<script>alert('File terlalu besar'); </script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Pemesanan gagal'); </script>";
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
    // $inv_id = 'INV' + date("Ymd") + $id;
    // $tgl = date("Y-m-d");

    $query = "INSERT INTO olahan VALUES('{$_POST['inputBarang']}', '" . basename( $_FILES["inputFoto"]["name"]) . "');";
    // echo $query;
    $stmt = $pdo->query($query);
    // if ($stmt->rowCount() == 0) {
        // echo '<option value="sesi1">Sesi 1 (10:00)</option>';
    // }
    $targetFile = $target_dir . basename($_FILES["inputFoto"]["name"]);
    // echo $targetFile;
    move_uploaded_file($_FILES["inputFoto"]["tmp_name"], $targetFile);
    echo "<script>alert('Olahan berhasil ditambahkan!</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    
    // echo htmlspecialchars( basename( $_FILES["imgTrf"]["name"]));
    // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)
?>