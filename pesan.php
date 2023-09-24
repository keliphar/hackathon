<?php
    $title = "Dapur Durian";
    $CSS = "./style.css";
    require_once('connectDB.php');
    include_once 'navbar.php';
?>
    <script>
        AOS.init();
    </script>
    <div class="container-fluid p-0 m-0 con">
        <video preload="TRUE" muted loop autoplay playsinline style="width: 100%;">
            <source src="asset/Pembuatan Olahan Durian.mp4" type="video/mp4" class="video">
        </video>
        <div class="overlay3">
            <h1 style="font-size: 58px;" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-150"><b>DAPUR DURIAN</b></h1>
        </div>
    </div>
    <div class="container-fluid scolor-5">
        <h2 class="text-center pt-4" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-150" data-aos-delay="1000"><b>Pilihan Olahan</b></h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM olahan");
            $count = 0;
            echo '<div class="row align-items-center justify-content-evenly pt-5 px-2" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-150" data-aos-delay="2000">';
            while($data = $stmt->fetch()) {
                if($count % 3 == 0 && $count > 1) {
                    echo '</div>';
                    echo '<div class="row align-items-center justify-content-evenly pt-5 px-2" data-aos="fade-down" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-150">';
                }
                echo '<div class="col-3 card text-center" style="width: 18rem;">';
                // echo '<div class="card text-center" style="width: 18rem;">';
                // echo '<img src="' . $data['img'] . '" class="card-img-top" alt="...">';
                echo "<img src='asset/foto_olahan/{$data['img']}' class='card-img-top mt-2' style='width=260px; height=260px;'>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data['nama'] . '</h5>';
                echo '</div>';
                echo '</div>';
                $count++;
            }
            echo '</div>';
        ?>
    </div>
    <div class="container-fluid scolor-5 con">
        <div class="row">
            <h3 class="text-center pt-4 text-dark fw-bolder" style="margin-bottom: 20px; margin-top: 20px;">Tunggu Apalagi? Segera Pesan Sekarang!</h3>
            <div class="col-3"></div>
            <div class="col-6 mx-5 my-3 d-flex justify-content-center" style="margin-left: 200px;">
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

                    //kalender lama
                    // echo '<div class="col ms-5 me-5">';
                    // echo '<div id="bulan">September</div>';
                    // echo '<div id="tahun">2023</div>';
                    // echo '<button type="button" class="btn btn-outline-success" onclick="updateCalendar(' . "'Left'" . ')"><</button>';
                    // echo "M T W T F S S";
                    // echo '<button type="button" class="btn btn-outline-success" onclick="updateCalendar(' . "'Right'" . ')">></button>';
                    // $ctr = array_search($day, $days);
                    // echo '<div id="kalender">';
                    // echo '<div class="row">';
                    // for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
                    //     echo '<div class="col">';
                    //     echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)" disabled>' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // for($i = 1; $i <= $lastDate; $i++) {
                    //     if($ctr % 7 == 0) {
                    //         if($ctr > 0)
                    //             echo '</div>';
                    //         echo '<div class="row">';
                    //     }
                    //     $ctr++;
                    //     echo '<div class="col">';   
                    //     echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)">' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // for($i = 1; $ctr % 7 != 0; $i++) {
                    //     $ctr++;
                    //     echo '<div class="col">';
                    //     echo '<button type="button" class="btn btn-outline-primary" onclick="showBook(this)" disabled>' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // echo '</div>';
                    // echo '</div>';
                    // echo '</div>';
                    //batas kalender lama

                    //kalender baru
                    
                    //batas kalender baru
                    echo '<div class="col-6">';
                    // echo '<div class="calendar" id="calendar">';
                    // //kalender header
                    // echo '<div class="calendar-header">';
                    // echo '<span class="year" id="tahun">';
                    // echo '2023';
                    // echo '</span>';
                    // echo '<div class="month-picker">';
                    // echo '<button type="button" class="btn btn-no-outline" onclick="updateCalendar(' . "'Left'" . ')"><</button>';
                    // echo '<span id="bulan">September</span>';
                    // echo '<button type="button" class="btn btn-no-outline" onclick="updateCalendar(' . "'Right'" . ')">></button>';
                    // echo '</div>';
                    // echo '</div>';
                    // //batas kalender header
                    // $ctr = array_search($day, $days);
                    // //kalender body
                    // echo '<div class="calendar-body" id="kalender">';
                    // echo '<div class="calendar-week-day">';
                    // echo '<div>Sun</div>';
                    // echo '<div>Mon</div>';
                    // echo '<div>Tue</div>';
                    // echo '<div>Wed</div>';
                    // echo '<div>Thu</div>';
                    // echo '<div>Fri</div>';
                    // echo '<div>Sat</div>';
                    // echo '</div>';
                    // echo '<div class="calendar-day">';
                    // for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
                    //     $ctr++;  
                    //     echo '<div>';
                    //     echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // for($i = 1; $i <= $lastDate; $i++) {
                    //     $ctr++;  
                    //     echo '<div>';
                    //     echo '<button type="button" class="btn custom-button" onclick="showBook(this)">' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // for($i = 1; $ctr % 7 != 0; $i++) {
                    //     $ctr++;
                    //     echo '<div>';
                    //     echo '<button type="button" class="btn custom-button" onclick="showBook(this)" disabled>' . $i . '</button>';
                    //     echo '</div>';
                    // }
                    // echo '</div>'; #close calender body
                    // echo '</div>';  #close calender
                    // // echo '</body>'; #light
                    // echo '</div>'; #close col
                    // echo '</div>';
                    // echo '<div class="col" id="sesiOlahan">';
                    // echo '</div>';
                    require_once('./kalendar.php')
                ?>
            </div>
            
            <div class="row">
                <div class="col-3" style="margin-left: 115px;"></div>
                <div class="col ms-5">
                <button type="submit" class="btn btn-light ms-5" data-bs-toggle="modal" data-bs-target="#Book" id="bookbtn">Book Now</button>
                <h6 class="mt-3 mb-4 text-dark" style="margin-left: -70px;">*pemesanan >20 orang booking melalui WA</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookPop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header pt-1 pb-2 text-center">
                    <h6 class="modal-title fs-3" id="bookModal">Detail Pemesanan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-1">
                    <form action="pesanDurian.php" method="post" id="booking" enctype="multipart/form-data">
                        <div class="row">
                            <div class="row">
                                <h5><b>Pilih jadwal</b></h5>
                            </div>
                            <?php
                                    $t = strtotime("+2 days");
                                    $t = date("Y-m-d", $t);
                                ?>
                            <div class="row">
                                <input type="date" class="my-2 mx-2" name="jadwal" id="pilihTanggal" onchange=pilihTgl() min='<?=$t?>' required>
                            </div>
                            <div class="row justify-content-evenly mt-2">
                                <!-- <div class="col-6 text-center">
                                    <select id="pilihSesi" name="pilihSesi">
                                        <option selected disabled>Pilih sesi</option>
                                    </select>
                                </div> -->
                                <div class="col-6 text-center" id = "showStok">
                                    <p>Pilih tanggal untuk melihat stok</p>
                                    <!-- <select id="pilihOlahan" name="pilihOlahan"> -->
                                        <!-- <option selected disabled>Pilih Olahan</option> -->
                                        
                                    <!-- </select> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5 class="mt-4"><b>Data Diri</b></h5>
                            <div class="row">
                                <div class="col">
                                    <label for="nama"><h6>Nama</h6></label>
                                    <input class="w-100 border border-2 border-dark rounded" type="text" name="nama" id="nama" required=""><br>
                                </div>
                                <div class="col">
                                    <label for="nowa"><h6>No. Whatsapp</h6></label>
                                    <input class="w-100 border border-2 border-dark rounded" type="number" name="nowa" id="nowa" required=""><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="orang"><h6>Pesanan</h6></label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="w-100 border border-2 border-dark rounded" type="number" name="kecil" id="kecil" required="" min=0 onkeyup=updateHarga() value="0">
                                        </div>
                                        <div class="col-4">
                                            <h6 class="pt-1">x Rp10.000,00</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="w-100 border border-2 border-dark rounded" type="number" name="sedang" id="sedang" required="" min=0 onkeyup=updateHarga() value="0">
                                        </div>
                                        <div class="col-4">
                                            <h6 class="pt-1">x Rp20.000,00</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="w-100 border border-2 border-dark rounded" type="number" name="besar" id="besar" required="" min=0 onkeyup=updateHarga() value="0">
                                        </div>
                                        <div class="col-4">
                                            <h6 class="pt-1">x Rp35.000,00</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>*diambil harga terendah untuk DP, harga fix tergantung durian yang dipilih saat pengambilan</h6>
                                    </div>
                                    <!-- <input class="w-100 border border-2 border-dark rounded" type="number" name="orang" id="orang" required="" min=10 max=20 onkeyup=updateHarga()> -->
                                </div>
                                <!-- <div class="col">
                                    <h6>x Rp20.000</h6>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col" id="warning"></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6>Total harga: </h6>
                                </div>
                                <div class="col-6"><h6>Rp<span id="harga">0</span></h6></div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <h6 class="mt-4"><b>Upload bukti DP</b></h6>
                                    <input type="file" id="imgTrf" name="imgTrf" accept="image/*" required>
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
            var kecil = parseInt(document.getElementById("kecil").value), sedang = parseInt(document.getElementById("sedang").value), besar = parseInt(document.getElementById("besar").value)
            const options = {
                style: 'decimal',
                currency: 'IDR',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }
            total = (kecil * 10000) + (sedang * 20000) + (besar * 35000);
            console.log(total)
            document.getElementById("harga").innerHTML = new Intl.NumberFormat('id-ID', options).format(total)
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
            document.getElementById("sesiOlahan").innerHTML = "";
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
            xhr.open('GET', "showCalendar.php?bln=" + name + "&thn=" + tahun, true);
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
            xhr.open('GET', "showSesi.php?tgl='" + tgl + "'", true);
            xhr.send();
        };
        function pilihTgl() {
            var tgl = document.getElementById("pilihTanggal").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    // var def = '<option selected disabled>Pilih sesi</option>';
                    console.log(tgl);
                    document.getElementById("showStok").innerHTML = xhr.responseText;
                }
            }
            xhr.open('GET', "showStok.php?tgl='" + tgl + "'", true);
            xhr.send();
        };
    </script>
<?php
    include "footer.php";
?>
