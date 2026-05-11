<?php

include "config.php";

$type =
$_POST['type'];

$data =
$_POST['data'];

mysqli_query(

    $conn,

    "INSERT INTO qr_history
    (qr_type, qr_data)

    VALUES

    ('$type','$data')"

);

?>