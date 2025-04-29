<?php
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "db_rentalcos";

$connect = mysqli_connect(
    $host,
    $username,
    $password,
    $databaseName
);

if (!$connect) {
    die("Gagal Tersambung ke Database" . mysqli_connect_error());
}
