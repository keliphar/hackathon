<?php
    // session_start();
    // $conn = mysqli_connect("localhost", "root", "", "rally_itland");
    // if (mysqli_connect_errno()) {
    //     echo "<script>alert('Failed to connect to MySQL: " . mysqli_connect_error() . "')</script>";
    // } else {
    //     echo "<script>console.log('Connected to MySQL')</script>";
    // }



    $host = "localhost";
    $dbname = "durian_slumbung";

    $conn_string = "mysql:host=$host;dbname=$dbname;chatset=UTF8";

    $username = "root";
    $password = "";

    $pdo;

    try{
        $pdo = new PDO($conn_string, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


// $query = "SELECT * FROM users WHERE username = 'admin'";
// $result = mysqli_query($conn, $query);
// if (mysqli_num_rows($result) == 0) {
//     $query = "INSERT INTO users VALUES ('GOD', 'admin', 'admin', 'admin@admin', 'admin', '1', 99999999999999999999)";
//     $result = mysqli_query($conn, $query);
//     if ($result) {
//         echo "<script>console.log('Admin created!')</script>";
//     }
// }
?>