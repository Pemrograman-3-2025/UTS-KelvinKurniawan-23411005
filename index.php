<?php
include "connection.php";

$sql = "SELECT * FROM costume";
$query = mysqli_query($connect, $sql);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental-Costume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4 mb-4 border border">
        <!-- Row 1 -->
        <div class="row text-center py-4 border border">
            <h1>Selamat Datang di Rental Costume Yumeclo</h1>
        </div>
        <!-- Row 1 -->

        <!-- Row 2 -->
        <!-- Modal Input-->
        <div class="modal fade" id="staticBackdrop_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Costume Form Input</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="costume_form" action="input_process.php" method="POST">

                            <div class="mb-3">
                                <label class="fw-bold d-block mb-2" for="form_nama">Nama Kostum :</label>
                                <input id="form_nama" placeholder="Nama Kostum" type="text" name="nama_cos" class="form-control mt-2 mb-3" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold d-block mb-2" for="form_ukuran">Pilih Ukuran Kostum :</label>
                                <select id="form_ukuran" name="ukuran_cos" class="form-control mt-2 mb-3">
                                    <option selected>---Pilih Ukuran---</option>
                                    <option value="S">Small (S)</option>
                                    <option value="M">Medium (M)</option>
                                    <option value="L">Large (L)</option>
                                    <option value="XL">Xtra Large (XL)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="form_harga" class="fw-bold d-block mb-2">Masukkan Harga Sewa :</label>
                                <input placeholder="Harga Sewa/4hari" id="form_harga" type="number" name="harga_cos" class="form-control" min="1" step="1" required>
                            </div>

                            <div class="mt-3 mb-3">
                                <label class="fw-bold me-3" for="type_form">Status Kostum :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_cos" id="flexRadioDefault1" value="ready">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Tersedia
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_cos" id="flexRadioDefault2" value="empty" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak Tersedia
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold d-block mb-2" for="form-deskripsi">Deskripsi Kostum :</label>
                                <textarea id="form-deskripsi" name="deskripsi_cos" placeholder="Deskripsi Kostum" class="form-control mt-3"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="costume_form" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Input -->

        <div class="row py-4 border border">
            <div class="col-4 d-flex justify-content-center">
                <a href="#">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop_input">
                        Input Kostum
                    </button>
                </a>
            </div>
        </div>
        <!-- Row 2 -->

        <!-- Row 3 -->

        <div class="row py-4 border border d-flex justify-content-center">
            <div class="col-11">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Kostum</th>
                            <th>Ukuran</th>
                            <th>Harga Sewa/4Hari</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $no = 1;

                        $ukuran_cos = [
                            "S" => "Small (S)",
                            "M" => "Medium (M)",
                            "L" => "Large (L)",
                            "XL" => "Xtra Large (XL)"
                        ];

                        $status_cos = [
                            "ready" => "Tersedia",
                            "empty" => "Tidak Tersedia",
                            "L" => "Large (L)",
                            "XL" => "Xtra Large (XL)"
                        ];

                        while ($data = mysqli_fetch_array($query)): ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_cos'] ?></td>
                                <td><?= $ukuran_cos[$data['ukuran']] ?? $data['ukuran'] ?></td>
                                <td><?= $data['harga'] ?></td>
                                <td><?= $status_cos[$data['statuscos']] ?? $data['statuscos']  ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td>
                                    <a href="edit_form.php?id=<?= $data['id'] ?>" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="delete_process.php?id=<?= $data['id'] ?>" onclick="return confirmDialog()" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Row 3 -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

<script>
    function confirmDialog() {
        const answer = confirm('Yakin Kamu Mau Hapus ?')
        if (answer) {
            return true
        } else {
            return false
        }
    }
</script>

</html>