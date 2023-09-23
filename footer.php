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
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= <?= $CSS ?>>
</head>
<body>
    <div class="container-fluid scolor-3 py-3">
        <div class="row">
            <div class="col-4">
                <p class="ms-5 text-light fs-2">DURIAN SLUMBUNG</p>
                <p class="ms-5 text-light fs-3">Follow Us On</p>
                <div class="d-flex flex-row ms-5 mb-3">
                    <a href="#" class=" pe-2">
                        <img src="./asset/instagram.png" alt="ig" srcset="" width="30px" height="30px">
                    </a>
                    <a href="#" class=" pe-2">
                        <img src="./asset/tiktok.png" alt="tt" srcset="" width="30px" height="30px">
                    </a>
                    <a href="" class=" pe-2">
                        <img src="./asset/facebook.png" alt="fb" srcset="" width="30px" height="30px">
                    </a>
                    <a href="" class=" pe-2">
                        <img src="./asset/youtube.png" alt="yt" srcset="" width="30px" height="30px">
                    </a>
                </div>
                <p class="ms-5 text-light credit" style="font-size: 10px;">Durian Slumbung 2023 | Icons by Icon8</p>
            </div>
            <div class="col-4 my-auto">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center my-1">
                            <a class="nav-link text-light <?= $homeActive ?>" aria-current="page" href="index.php">Home</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center my-1">
                            <a class="nav-link text-light <?= $dapurActive ?>" href="dapur-durian.php">Dapur Durian</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center my-1">
                            <a class="nav-link text-light <?= $aboutActive ?>" href="about-us.php"> About Us</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center my-1">
                            <button class="btn btn-outline-dark pesan-btn btn-sm rounded-pill" type="submit"> &nbsp;&nbsp;&nbsp;Pesan&nbsp;&nbsp;&nbsp; </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <div class="row align-items-bottom justify-content-center">
                            <div class="col-1 d-flex justify-content-end">
                                <img src="./asset/location.png" alt="loc" srcset="" width="30px" height="30px">
                            </div>
                            <div class="col-3">
                                <h3 class="text-light">LOCATION</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-light info-footer text-center">Durkedir (durian Kediri) 100% BERGARANSI, Meloyo, Mlancu, Kec. Kandangan, Kabupaten Kediri, Jawa Timur 64294</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row align-items-bottom justify-content-center">
                            <div class="col-3 d-flex justify-content-end">
                                <img src="./asset/contact.png" alt="loc" srcset="" width="30px" height="30px">
                            </div>
                            <div class="col-6">
                                <h3 class="text-light">Contact Person</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-light info-footer text-center">WA : 0812-5975-6928 (Mulyono)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
