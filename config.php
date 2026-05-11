<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "projectkia_qr";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

if(!$conn){
    die("Koneksi gagal");
}

?>