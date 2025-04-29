<?php

include 'connection.php';

$nama = $_POST['nama_cos'];
$ukuran = $_POST['ukuran_cos'];
$harga = $_POST['harga_cos'];
$status = $_POST['status_cos'];
$deskripsi = $_POST['deskripsi_cos'];

$sql = "INSERT INTO costume (nama_cos,ukuran,harga,statuscos,deskripsi) VALUE (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "ssiss", $nama,$ukuran,$harga,$status,$deskripsi);
$query = mysqli_stmt_execute($stmt);

if ($query) {
    echo "
    <script>
    alert ('Berhasil Input')
    window.location = 'index.php'
    </script>";
} else {
    echo "
    <script>
    alert ('Gagal Input')
    window.location = 'index.php'
    </script>";
}
