<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "db_STKI";
 

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//mysqli_close($conn);
?>