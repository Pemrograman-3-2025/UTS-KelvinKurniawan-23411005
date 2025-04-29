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
    die("Failed to connecting database" . mysqli_connect_error());
}
