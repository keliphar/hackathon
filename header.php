<?php
    require_once "connectDB.php";
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title><?=$title;?></title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="<?=$css?>">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <div class="navbar-brand p-0 text-light">
                <a class="navbar-logo text-decoration-none text-reset" href="index.php">Durian Slumbung</a>
            </div>
            <div class="collapse navbar-collapse">
                <div class="col col-2 col-lg-1 text-lg-end mb-3 mb-lg-0 d-flex text-light">
                    <a href="index.php">Home</a>
                    <a href="order.php">Order</a>
                    <a href="dapur-durian.php">Dapur Durian</a>
                    <a href="about.php">About</a>
                </div>
            </div>
        </div>
    </nav>