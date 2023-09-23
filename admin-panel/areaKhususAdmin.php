<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] == False) {
        // echo "masuk";
        // echo isset($_SESSION['login']);
        header("Location: ../selainAdminDilarangMasuk.php");
    }
    $title = "Admin Panel";
    $CSS = "../style.css";
    // require_once("../connectDB.php");
    require_once("./header.php");
    require_once "../connectDB.php";
    if (isset($_POST['btndelete'])) {
        $txt1 = $_POST['txt1'];
        $stmt = $pdo->query("delete from olahan where nama = '$txt1'");
    }
?>
<link rel="stylesheet" href="../style-kalender.css">
<script src="../script-kalender.js"></script>
<div class="container-fluid text-center">
    <div class="row" id="container">
        <div class="col-2 bg-dark-subtle vh-100">
            <h1 style="margin-top: 20px;">Fitur Admin</h1>
            <form action="" method="get">
                <input type="submit" value="Lihat Order" class="btn btn-success mt-4" name="view" style="width: 200px;"><br>
                <input type="submit" value="Tambah Barang" class="btn btn-success mt-4" name="view" style="width: 200px;"><br>
                <input type="submit" value="Atur Stok" class="btn btn-success mt-4" name="view" style="width: 200px;">
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
                echo "<h1 style='text-align:center; margin-top: 20px;'>List Orderan</h1>";
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
                echo "<h1 style='margin-top: 20px;'>Tambah Barang</h1>";
                echo "
                <form action='tambahOlahan.php' method='post' enctype='multipart/form-data'>
                    <div class='row align-items-start'>
                        <div class='mb-3 col'>
                            <label for='inputBarang' class='form-label'>Nama Barang</label>
                            <input type='text' class='form-control' id='inputBarang' name='inputBarang'>
                        </div>
                        <div class='mb-3 col'>
                            <label for='inputFoto' class='form-label'>Upload Foto Barang</label>
                            <input type='file' class='form-control' id='inputFoto' name='inputFoto' accept='image/*'>
                        </div>                        
                        </div>
                    <button type='submit' class='btn btn-primary mb-3'>Submit</button>
                </form>";
                $stmt = $pdo->query("SELECT * FROM olahan");
                $count = 0;
                echo '<div class="row">';
                while($data = $stmt->fetch()) {
                    if($count % 5 == 0) {
                        if($count > 0)
                            echo '</div>';
                        echo '<div class="row">';
                    }
                    // echo '<div class="col>"';
                    echo '<div class="card admin-card" style="width: 18rem; margin-left: 16px;">';
                    echo '<img src="../asset/foto_olahan/' . $data['img'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text"> <b>' . $data['nama'] . '</b></p>';
                    echo "<form method='post' action=''>";
                    $nama = $data['nama'];
                    echo "<input type='hidden' name='txt1' value='$nama'>";
                    echo "<input type='submit' name='btndelete' value='Delete' style='padding: 5px; border-radius: 10px; background-color: green; color: white;'></td>";
                    echo "</form>";
                    echo '</div>';
                    echo '</div>';
                    $count++;
                }
                echo '</div>';
            }else if($viewpage == "Atur Stok"):?>
                <div class="container-fluid" style="overflow: hidden; margin-top: -25px;">
                        <div class="row">
                            <div class="row mx-5 my-3">
                                <?php
                                    $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                                    $currentDateTime = new DateTime('now');
                                    $date = $currentDateTime->format('Y-m-01');
                                    $date_obj = new DateTime($date);
                                    $day = $date_obj->format('D');
                                    $lastDay = strtotime("Last day of " . $currentDateTime->format('M'));
                                    $lastDate = date("d", $lastDay);
                                    $prevMonth = strtotime("last day of previous month");
                                    $prevMonth = date("d", $prevMonth);
                                    echo '<div class="col">';
                                    require_once('../kalendar.php')
                                ?>
                            </div>
                        </div>
                    </div>
            <?php endif?>
        </div>
    </div>
</div>
    <script>
        function updateCalendar(act) {
            var idx = 0;
            const month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
            if(act == 'Right') {
                idx = month.indexOf(document.getElementById("bulan").innerHTML)
                idx++
            } else {
                idx = month.indexOf(document.getElementById("bulan").innerHTML)
                idx--
            }
            if(idx < 0) {
                document.getElementById("tahun").innerHTML = parseInt(document.getElementById("tahun").innerHTML) - 1
                idx = 11
            }
            else if(idx > 11)
                document.getElementById("tahun").innerHTML = parseInt(document.getElementById("tahun").innerHTML) + 1
            document.getElementById("bulan").innerHTML = month[idx % 12]
            document.getElementById("sesiOlahan").innerHTML = "";
            var prev = document.getElementById("clicked")
            if(prev != null && prev.classList.contains('btn-dark')) {
                prev.classList.remove('btn-dark')
                prev.removeAttribute("id", "clicked")
            }
            m = month.indexOf(document.getElementById("bulan").innerHTML)
            const bln = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            name = bln[m];
            var tahun = document.getElementById("tahun").innerHTML
        
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("kalender").innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET', "../showCalendar.php?bln=" + name + "&thn=" + tahun, true);
            xhr.send();
        };
        function showBook(e) {
            var prev = document.getElementById("clicked")
            if(prev != null && prev.classList.contains('btn-dark')) {
                prev.classList.remove('btn-dark')
                prev.removeAttribute("id", "clicked")
            }
            e.setAttribute("id", "clicked")
            e.classList.add('btn-dark')
            const month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
            m = month.indexOf(document.getElementById("bulan").innerHTML) + 1

            var tgl = m + '-' + e.innerHTML + '-' + document.getElementById("tahun").innerHTML
            let parse = Date.parse(tgl);

            let date = new Date(parse);
            var tgl = date.getFullYear() + "-" + m.toString().padStart(2, '0') + "-" + date.getDate().toString().padStart(2, '0');

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("sesiOlahan").innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET', "updateStok.php?tgl='" + tgl + "'", true);
            xhr.send();
        };
        function pilihTgl() {
            var tgl = document.getElementById("pilihTanggal").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    // console.log(tgl);
                    var def = '<option selected disabled>Pilih sesi</option>';
                    document.getElementById("pilihSesi").innerHTML = def + xhr.responseText;
                }
            }
            xhr.open('GET', "pilihSesi.php?tgl='" + tgl + "'", true);
            xhr.send();
        };
    </script>
<script>
    function stokDurian() {
    }
</script>

<?php 
require_once("../footer.php");
?>