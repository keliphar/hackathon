<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] == False) {
        // echo "masuk";
        // echo isset($_SESSION['login']);
        header("Location: ../selainAdminDilarangMasuk.php");
    }
    $title = "Admin Panel";
    $css = "";
    // require_once("../connectDB.php");
    require_once("./header.php");
?>
<div class="container-fluid text-center">
    <div class="row" id="container">
        <div class="col-2 bg-dark-subtle vh-100">
            <h1>Fitur Admin</h1>
            <form action="" method="get">
                <input type="submit" value="Lihat Order" class="btn btn-success mt-4" name="view">
                <input type="submit" value="Tambah Barang" class="btn btn-success mt-4" name="view">
                <input type="submit" value="Atur Stok" class="btn btn-success mt-4" name="view">
            </form>
        </div>
        <div class="col bg-body-secondary" id="content">
            <!-- <h1 style="text-align:center; line-height:75vh;">Welcome to the admin page...</h1> -->
            <?php 
            if(!isset($_GET['view']))
                $_GET['view'] = 'Lihat Order';
            
            // if(isset($_GET['view'])){
            $viewpage = $_GET['view'];
            if($viewpage == "Lihat Order"){
                $stmt = $pdo -> prepare("SELECT inv_id,nama,sesi,tgl_pesan,bukti_bayar,nowa,status from book_olahan ORDER BY tgl_pesan DESC;");
                $stmt -> execute();
                $data = $stmt -> fetchAll();
                echo "<h1 style='text-align:center'>List Orderan</h1>";
                foreach ($data as $key) {
                    $outlineModal;
                    if($key['status']==0){
                        $outlineModal="warning";
                    }else if($key['status']==1){
                        $outlineModal="success";
                    }else{
                        $outlineModal="danger";
                    }
                    echo "
                    <button type='button' class='btn btn-".$outlineModal." mt-3' data-bs-toggle='modal' data-bs-target='#".$key['inv_id']."'>
                    <b>ID Pemesanan : </b>".$key['inv_id']." <b>Nama :</b> '".$key['nama']."' <b>Sesi :</b> '".$key['sesi']."' <b>Tanggal Pemesanan : </b>'".$key['tgl_pesan']."' <b>No. WA : </b>'".$key['nowa']."'
                    </button>

                    
                    <div class='modal fade' id='".$key['inv_id']."' tabindex='-1' aria-labelledby='".$key['inv_id'].'Label'."' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='".$key['inv_id'].'Label'."'>Bukti Transfer</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            {$key['inv_id']}
                        </div>";
                        if($key['status']==0) {
                            echo "<div class='modal-footer'>
                            <form action='updatePesanan.php' method='post' id='booking'>
                            <button type='submit' class='btn btn-outline-success' name='konfirmasi' value='berhasil'>Pembayaran Berhasil</button>";
                            echo "<button type='submit' class='btn btn-outline-danger' name='konfirmasi' value='gagal'>Pembayaran Gagal</button>
                            <input type='hidden' name='inv_id' value='{$key['inv_id']}'></form>
                            </div>";
                        }
                    echo "</div>
                    </div>
                    </div>
                    ";
                }
            }else if($viewpage == "Tambah Barang"){
                echo "<h1 style='text-align:center'>Tambah Barang</h1>";
                echo "
                <div style='max-width:50%' class='position-absolute start-50'>
                    <form action='admin-panel.php' method='get'>
                        <div class='mb-3'>
                            <label for='inputNama' class='form-label'>Nama Barang</label>
                            <input type='text' class='form-control' id='inputNama' name='inputBarang'>
                        </div>
                        <div class='mb-3'>
                            <label for='inputFoto' class='form-label'>Upload Foto Barang</label>
                            <input type='file' class='form-control' id='inputFoto' name='inputFoto'>
                        </div>                        
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </form>
                </div>";
            }else if($viewpage == "Atur Stok"){
                
            }
            // }else{
            //     echo "Tidak masuk";
            // }

            ?>
        </div>
    </div>
</div>
<script>
    function stokDurian() {
    }
</script>

<?php 
require_once("../footer.php");
?>