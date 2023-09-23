<?php
    $title = "Dapur Durian";
    $css = "";
    include_once 'header.php';
?>
    <div class="m-5">
        <h1>Durian Slumbung</h1>
        <h3>Olahan Durian Lokal</h3>
        <?php
            $stmt = $pdo->query("SELECT * FROM olahan");
            $count = 0;
            echo '<div class="row">';
            while($data = $stmt->fetch()) {
                if($count % 3 == 0) {
                    if($count > 0)
                        echo '</div>';
                    echo '<div class="row">';
                }
                echo '<div class="col>"';
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="' . $data['img'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $data['nama'] . '</p>';
                echo '</div>';
                echo '</div>';
                $count++;
            }
            echo '</div>';
        ?>
        <h3>Pesan Sekarang!!</h3>
        <div class="row">
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

                echo '<div class="col ms-5 me-5">';
                echo '<div id="bulan">September</div>';
                echo '<div id="tahun">2023</div>';
                echo '<button type="button" class="btn btn-outline-success" onclick="updateCalendar(' . "'Left'" . ')"><</button>';
                echo "M T W T F S S";
                echo '<button type="button" class="btn btn-outline-success" onclick="updateCalendar(' . "'Right'" . ')">></button>';
                $ctr = array_search($day, $days);
                echo '<div id="kalender">';
                echo '<div class="row">';
                for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)" disabled>' . $i . '</button>';
                    echo '</div>';
                }
                for($i = 1; $i <= $lastDate; $i++) {
                    if($ctr % 7 == 0) {
                        if($ctr > 0)
                            echo '</div>';
                        echo '<div class="row">';
                    }
                    $ctr++;
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)">' . $i . '</button>';
                    echo '</div>';
                }
                for($i = 1; $ctr % 7 != 0; $i++) {
                    $ctr++;
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)" disabled>' . $i . '</button>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="col" id="sesiOlahan">';
                echo '</div>';
                
            ?>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#Book" id="bookbtn">Book Now</button>
    <h6>*pemesanan > 20 book by WA</h6>

    <div class="modal fade" id="Book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookPop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header pt-1 pb-2 text-center">
                    <h6 class="modal-title fs-3" id="bookModal">Detail Pemesanan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-1">
                    <form action="booking.php" method="post" id="booking">
                        <div class="row">
                            <div class="row">
                                <h6>Pilih jadwal</h6>
                            </div>
                            <div class="row">
                                <input type="date" name="jadwal" id="pilihTanggal" onchange=pilihTgl()>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select id="pilihSesi" name="pilihSesi">
                                        <option selected disabled>Pilih sesi</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="pilihOlahan" name="pilihOlahan">
                                        <option selected disabled>Pilih Olahan</option>
                                        <?php
                                            $stmt = $pdo->query("SELECT * FROM olahan");
                                            while($data = $stmt->fetch()) {
                                                echo '<option value="' . $data['nama'] . '">' . $data['nama'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h6>Data Diri</h6>
                            <div class="row">
                                <div class="col">
                                    <label for="nama"><h6>Nama</h6></label>
                                    <input class="w-100 border border-2 border-dark rounded" type="text" name="nama" id="nama" required=""><br>
                                </div>
                                <div class="col">
                                    <label for="nowa"><h6>No Whatsapp</h6></label>
                                    <input class="w-100 border border-2 border-dark rounded" type="text" name="nowa" id="nowa" required=""><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="orang"><h6>Jumlah Orang</h6></label>
                                    <input class="w-100 border border-2 border-dark rounded" type="number" name="orang" id="orang" required="" min=10 max=20 onkeyup=updateHarga()><br>
                                </div>
                                <div class="col">
                                    <h6>x Rp20.000</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" id="warning"></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6>Total harga: </h6>
                                </div>
                                <div class="col" id="harga"><h6>0</h6></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6>Upload bukti pembayaran</h6>
                                    <input type="file" id="img" name="img" accept="image/*">
                                </div>
                            </div>
                            <div class="row mt-2">
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100"><h6 class="m-0 p-1">Submit</h6></button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateHarga() {
            var jum = parseInt(document.getElementById("orang").value)
            if(jum > 9 && jum < 21) {
                document.getElementById("warning").innerHTML = ""
                document.getElementById("harga").innerHTML = "<h6>" + (jum * 20000) + "</h6>"
            } else {
                if(!isNaN(jum))
                    document.getElementById("warning").innerHTML = '<div class="alert alert-danger" role="alert"><h6>Jumlah orang harus 10-20 orang</h6></div>'                    
                document.getElementById("harga").innerHTML = "<h6>0</h6>"
            }
        };
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
            var prev = document.getElementById("clicked")
            if(prev != null && prev.classList.contains('btn-warning')) {
                prev.classList.remove('btn-warning')
                prev.classList.add('btn-outline-primary')
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
            xhr.open('GET', "showCalendar.php?bln=" + name + "&thn=" + tahun, true);
            xhr.send();
        };
        function showBook(e) {
            var prev = document.getElementById("clicked")
            if(prev != null && prev.classList.contains('btn-warning')) {
                prev.classList.remove('btn-warning')
                prev.classList.add('btn-outline-primary')
                prev.removeAttribute("id", "clicked")
            }
            e.setAttribute("id", "clicked")
            e.classList.add('btn-warning')
            e.classList.remove('btn-outline-primary')
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
            xhr.open('GET', "showSesi.php?tgl='" + tgl + "'", true);
            xhr.send();
        };
        function pilihTgl() {
            // console.log('Function called!');
            // console.log("masuk")
            // console.log()
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
            // console.log(document.getElementById("pilihTanggal").value)

            // var jum = parseInt(document.getElementById("orang").value)
            // if(jum > 9 && jum < 21) {
            //     document.getElementById("warning").innerHTML = ""
            //     document.getElementById("harga").innerHTML = "<h6>" + (jum * 20000) + "</h6>"
            // } else {
            //     if(!isNaN(jum))
            //         document.getElementById("warning").innerHTML = '<div class="alert alert-danger" role="alert"><h6>Jumlah orang harus 10-20 orang</h6></div>'                    
            //     document.getElementById("harga").innerHTML = "<h6>0</h6>"
            // }
        };
    </script>
<?php
    include "footer.php";
?>
