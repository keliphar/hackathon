<?php
    require_once "../connectDB.php";

    $tgl = $_GET['tgl'];

    echo '<div class="card" style="width: 18rem;"><ul class="list-group list-group-flush">';

    $stmt = $pdo->query("SELECT * FROM stok_durian WHERE tanggal=$tgl");
    if ($stmt->rowCount() == 0) {
        echo '<li class="list-group-item">Kecil: 0</li>';
        echo '<li class="list-group-item">Sedang: 0</li>';
        echo '<li class="list-group-item">Besar: 0</li>';
    } else {
        $stok = $stmt->fetch();
        echo '<li class="list-group-item">Kecil: ' . $stok['kecil'] . ' </li>';
        echo '<li class="list-group-item">Sedang: ' . $stok['sedang'] . ' </li>';
        echo '<li class="list-group-item">Besar: ' . $stok['besar'] . ' </li>';
    }
    echo '</ul></div>';
?>

<div class="row">
    <div class="col ms-5">
    <button type="submit" class="btn btn-light ms-5" data-bs-toggle="modal" data-bs-target="#Stok" id="stokbtn" value="<?=$tgl?>">Tambah Stok</button>
    </div>
</div>
<div class="modal fade" id="Stok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="stokPop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header pt-1 pb-2 text-center">
                <h6 class="modal-title fs-3" id="stokModal">Tambah Stok</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <form action="tambahStok.php" method="post" id="tambahStok">
                    <div class="row">
                        <div class="col">
                            <label for="kecil"><h6>Kecil: </h6></label>
                            <input class="w-100 border border-2 border-dark rounded" type="text" name="kecil" id="kecil" required="" value=0><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sedang"><h6>Sedang: </h6></label>
                            <input class="w-100 border border-2 border-dark rounded" type="text" name="sedang" id="sedang" required="" value=0><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="besar"><h6>Besar: </h6></label>
                            <input class="w-100 border border-2 border-dark rounded" type="text" name="besar" id="besar" required="" value=0><br>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="hidden" name="tgl" value="<?=$tgl?>">
                            <button type="submit" class="btn btn-primary w-100"><h6 class="m-0 p-1">Submit</h6></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>