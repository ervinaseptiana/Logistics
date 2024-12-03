<?php

$servername = "localhost"; //Nama server database
$username = "root";        //Username database
$password = "";            //Password database
$dbname = "db_logistik"; //Nama database

//Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

//Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // // cek koneksi
// if (mysqli_connect_errno()) {
//     echo "Gagal koneksi ke database";
// } else {
//     echo "Berhasil koneksi";
// }

//url induk
$main_url = "http://localhost/logistik/";

?>