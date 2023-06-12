<?php 
 
$server = "127.0.0.1";
$user = "root";
$pass = "";
$database = "wisata_bunaken";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>