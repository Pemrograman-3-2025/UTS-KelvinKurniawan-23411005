<?php
include "connection.php";

$idCos = $_GET['id'];

$sql = "SELECT * FROM costume WHERE id = $idCos";
$query = mysqli_query($connect, $sql);

$data = mysqli_fetch_array($query);

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 550px;">
            <h4 class="mb-4 text-center">Edit Katalog Kostum</h4>
            <form action="edit_process.php?id=<?= $idCos ?>" method="POST">
                <div class="mb-3">
                    <label class="fw-bold d-block mb-2" for="form_nama">Nama Kostum :</label>
                    <input value="<?= $data['nama_cos'] ?>" id="form_nama" placeholder="Anime Title" type="text" name="nama_cos" class="form-control mt-2 mb-3" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2" for="form_ukuran">Pilih Ukuran Kostum :</label>
                    <select id="form_ukuran" name="ukuran_cos" class="form-control mt-2 mb-3">
                        <option value="S" <?= $data['ukuran'] === "S" ? "selected" : "" ?>>Small (S)</option>
                        <option value="M" <?= $data['ukuran'] === "M" ? "selected" : "" ?>>Medium (M)</option>
                        <option value="L" <?= $data['ukuran'] === "L" ? "selected" : "" ?>>Large (L)</option>
                        <option value="XL" <?= $data['ukuran'] === "XL" ? "selected" : "" ?>>Xtra Large (XL)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="form_harga" class="fw-bold d-block mb-2">Harga Sewa :</label>
                    <input value="<?= $data['harga'] ?>" placeholder="Harga Sewa/4hari" id="form_harga" type="number" name="harga_cos" class="form-control" min="1" step="1" required>
                </div>

                <div class="mt-3 mb-3">
                    <label class="fw-bold me-3" for="type_form">Status Kostum :</label>
                    <div class="form-check form-check-inline">
                        <input <?= $data['statuscos'] === "ready" ? "checked" : "" ?> class="form-check-input" type="radio"
                            name="status_cos" value="ready" id="ready" required>
                        <label class="form-check-label" for="ready">Tersedia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input <?= $data['statuscos'] === "empty" ? "checked" : "" ?> class="form-check-input" type="radio"
                            name="status_cos" value="empty" id="empty" required>
                        <label class="form-check-label" for="empty">Tidak Tersedia</label>
                    </div>
                </div>

                <div class="mt-3 mb-3">
                <label class="fw-bold me-3" for="form_deskripsi">Deskripsi Kostum :</label>
                <textarea id="form_deskripsi" name="deskripsi_cos" placeholder="Deskripsi Kostum" class="form-control mt-3"><?= $data['deskripsi'] ?></textarea>

                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">Save</button>
            </form>
        </div>
    </div>
</body>


</html>