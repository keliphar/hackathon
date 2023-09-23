<?php
    $title = "Dapur Durian";
    $css = "";
    include_once 'header.php';
    // $query = "SELECT * FROM panitia WHERE username = '{$_SESSION['user']}'";
    // $result = mysqli_query($conn, $query);
    // $data = mysqli_fetch_assoc($result);
?>
    <div class="m-5">
        <h1>Durian Slumbung</h1>
        <h3>Olahan Durian Lokal</h3>
        <?php
            $stmt = $pdo->query("SELECT * FROM olahan");
            $count = 0;
            echo '<div class="row">';
            while($data = $stmt->fetch()) {
                
                // <div class="col">
                //     <div class="card" style="width: 18rem;">
                //         <img src="' . $data['img'] . '" class="card-img-top" alt="...">
                //         <div class="card-body">
                //             <p class="card-text">' . $data['nama'] . '</p>
                //         </div>
                //     </div>
                // </div>
                
    //   <div class="col-sm-6 mb-3 mb-sm-0">
    //     <div class="card">
    //       <div class="card-body">
    //         <h5 class="card-title">Special title treatment</h5>
    //         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    //         <a href="#" class="btn btn-primary">Go somewhere</a>
    //       </div>
    //     </div>
    //   </div>
    //   <div class="col-sm-6">
    //     <div class="card">
    //       <div class="card-body">
    //         <h5 class="card-title">Special title treatment</h5>
    //         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    //         <a href="#" class="btn btn-primary">Go somewhere</a>
    //       </div>
    //     </div>
    //   </div>
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
                // var_dump($days);
                $currentDateTime = new DateTime('now');
                $date = $currentDateTime->format('Y-m-01');

                // var_dump($date);
                // print($currentDate);
                // $date = $currentDate->format('YYYY-MM-01');
                $date_obj = new DateTime($date);
                // var_dump($date_obj);
                // $date_obj->format('D');
                $day = $date_obj->format('D');
                // echo $day;
                // echo array_search($day, $days) + 1;
                // echo $currentDateTime->format('M');

                $lastDay = strtotime("Last day of " . $currentDateTime->format('M'));
                $lastDate = date("d", $lastDay);
                // echo $lastDate;
                // echo $lastDate;
                // echo "-" . array_search($day, $days) + 1 . " days from " . date('Y-m-d', $lastDay);
                // echo $lastDay;
                // $temp = strtotime("-" . array_search($day, $days) + 1 . " days from " . date('Y-m-d', $lastDay));
                // $temp = strtotime("-" . array_search($day, $days) + 1 . " days from last day");
                // echo $temp;
                // echo date("Y-m-d", strtotime("-" . array_search($day, $days) + 1 . " days"));
                // echo date("Y-m-d", $temp) . "<br>";

                // $nextMonth=strtotime("Next Month");
                // echo "<br>";
                // echo $nextMonth;
                // $nextMonth = new DateTime($nextMonth);
                // $nextMonth = $nextMonth->format('Y-m-01');
                // echo date("Y-m-d", $nextMonth) . "<br>";
                // $nextMonth = $date;
                // echo ;
                $prevMonth = strtotime("last day of previous month");
                $prevMonth = date("d", $prevMonth);

                echo '<div class="col ms-5 me-5">';
                echo "M T W T F S S";
                $ctr = array_search($day, $days);
                echo '<div class="row">';
                // for($i = $lastDate - array_search($day, $days) + 2; $i <= $lastDate; $i++) {
                //     // echo $i . "<br>";
                //     if($ctr % 7 == 0) {
                //         if($ctr > 0)
                //             echo '</div>';
                //         echo '<div class="row">';
                //     }
                //     $ctr++;
                //     echo '<div class="col">';
                //     echo '<button type="button" class="btn btn-primary">' . $i . '</button>';
                //     echo '</div>';
                // }
                for($i = $prevMonth - $ctr + 1; $i <= $prevMonth; $i++) {
                    // echo $i . "<br>";
                    // if($ctr % 7 == 0) {
                    //     if($ctr > 0)
                    //         echo '</div>';
                    //     echo '<div class="row">';
                    // }
                    // $ctr++;
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick=showBook(this)>' . $i . '</button>';
                    echo '</div>';
                }
                for($i = 1; $i <= $lastDate; $i++) {
                    // echo $i . "<br>";
                    if($ctr % 7 == 0) {
                        if($ctr > 0)
                            echo '</div>';
                        echo '<div class="row">';
                    }
                    $ctr++;
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick=showBook(this)>' . $i . '</button>';
                    echo '</div>';
                }
                for($i = 1; $ctr % 7 != 0; $i++) {
                    $ctr++;
                    echo '<div class="col">';
                    echo '<button type="button" class="btn btn-outline-primary" onclick=showBook(this)>' . $i . '</button>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '<div class="col" id="sesiOlahan">';
                echo '</div>';
            ?>
        </div>
    </div>
    
    <!-- <button type="button" class="btn btn-primary">Book Now</button> -->
    <button type="submit" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#Book" id="bookbtn">Book Now</button>
    <h6>*pemesanan > 20 book by WA</h6>

    <div class="modal fade" id="Book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookPop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header pt-1 pb-2 text-center">
                    <h6 class="modal-title fs-3" id="bookModal"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-1">
                    <form action="booking.php" method="post" id="booking">
                        <div class="row">
                            <h6>Pilih jadwal</h6>
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
            // console.log(jum)
            if(jum > 9 && jum < 21) {
                document.getElementById("warning").innerHTML = ""
                document.getElementById("harga").innerHTML = "<h6>" + (jum * 20000) + "</h6>"
            } else {
                if(!isNaN(jum))
                    document.getElementById("warning").innerHTML = '<div class="alert alert-danger" role="alert"><h6>Jumlah orang harus 10-20 orang</h6></div>'                    
                document.getElementById("harga").innerHTML = "<h6>0</h6>"
            }
        };
        function showBook(e) {
            var prev = document.getElementById("clicked")
            // console.log(prev)
            // console.log(prev == null)
            if(prev != null && prev.classList.contains('btn-warning')) {
                // console.log("remove")
                prev.classList.remove('btn-warning')
                prev.classList.add('btn-outline-primary')
                // console.log(prev)
                prev.removeAttribute("id", "clicked")
            }
            // setTimeout(function(){
                e.setAttribute("id", "clicked")
                // console.log(e)
                e.classList.add('btn-warning')
                e.classList.remove('btn-outline-primary')
            // }, 1);
            // var select = e
            document.getElementById("sesiOlahan").innerHTML = '<div class="card" style="width: 18rem;"><ul class="list-group list-group-flush"><li class="list-group-item">An item</li><li class="list-group-item">A second item</li><li class="list-group-item">A third item</li></ul></div>'
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status = 200) {
                    console.log('ajak oke!');
                }
            }
            
            xhr.open('POST', 'ajax/showSesi.php', true);

            xhr.send();

            

        };
    </script>
<?php
    include "footer.php";
?>