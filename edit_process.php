<?php

include 'connection.php';

$id_Cos = $_GET['id'];
$nama = $_POST['nama_cos'];
$ukuran = $_POST['ukuran_cos'];
$harga = $_POST['harga_cos'];
$status = $_POST['status_cos'];
$deskripsi = $_POST['deskripsi_cos'];

$sql = "UPDATE costume SET nama_cos = ?, ukuran = ?, harga = ?, statuscos = ?, deskripsi = ? WHERE id = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "ssissi", $nama, $ukuran, $harga, $status, $deskripsi, $id_Cos);
$query = mysqli_stmt_execute($stmt);

if ($query) {
    echo "
    <script>
    alert ('Berhasil Edit Data')
    window.location = 'index.php'
    </script>";
} else {
    echo "
    <script>
    alert ('Gagal Edit Data')
    window.location = 'edit_form.php'
    </script>";
}
