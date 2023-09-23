<?php 
    $homeActive;
    $dapurActive;
    $aboutActive;
    if($title == "Durian Slumbung"){
        $homeActive = "active disabled fw-bold";
    }else if($title == "Dapur Durian"){
        $dapurActive = "active disabled fw-bold";
    }else if($title == "About Us"){
        $aboutActive = "active disabled fw-bold";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= <?= $CSS ?>>
</head>
<body>
    <nav class="scolor-3 navbar navbar-expand-lg ">
        <div class="container-fluid scolor">
            <a class="navbar-brand text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-light <?= $homeActive ?>" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light <?= $dapurActive ?>" href="dapur-durian.php">Dapur Durian</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light <?= $aboutActive ?>" href="about-us.php"> About Us</a>
                </li>
            </ul>
                <button class="btn btn-outline-dark pesan-btn btn-sm rounded-pill me-4" type="submit"> &nbsp;&nbsp;Pesan&nbsp;&nbsp; </button>
            </div>
        </div>
    </nav>
</body>