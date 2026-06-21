<?php
$shost = "local host";
$user = "root";
$pass = "";
$db = "db_portofolio";

$conn = mysqli_connect($shost, $user, $pass, $db);

if (!$conn) {
    die("koneksi database gagal: ". mysqli_connect_error());
}
?>
