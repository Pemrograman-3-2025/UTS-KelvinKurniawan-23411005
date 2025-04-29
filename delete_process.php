<?php

include 'connection.php';

$id_Cos = $_GET['id'];

$sql = "DELETE FROM costume WHERE id=?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_Cos);
$query = mysqli_stmt_execute($stmt);

if ($query) {
    echo "
    <script>
    alert ('Berhasil Delete Katalog')
    window.location = 'index.php'
    </script>";
} else {
    echo "
    <script>
    alert ('Gagal Delete Katalog')
    window.location = 'index.php'
    </script>";
}
