<?php
session_start();
include "../config/db.php";

// Cek login admin
if (!isset($_SESSION['is_login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$action = $_GET['action'] ?? '';

// PROSES TAMBAH
if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $jenis = $_POST['jenis'];
    $harga_per_hari = $_POST['harga_per_hari'];
    $status = $_POST['status'];

    // Proses upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../assets/img/" . $foto;
    move_uploaded_file($tmp, $path);

    $query = "INSERT INTO alat_berat (nama_alat, jenis, harga_per_hari, status, foto)
                VALUES ('$nama_alat', '$jenis', '$harga_per_hari', '$status', '$foto')";
    mysqli_query($conn, $query);
    header("Location: alat_berat.php");
    exit;
}

// PROSES EDIT
if ($action == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_alat = $_POST['nama_alat'];
        $jenis = $_POST['jenis'];
        $harga_per_hari = $_POST['harga_per_hari'];
        $status = $_POST['status'];

        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $tmp = $_FILES['foto']['tmp_name'];
            $path = "../assets/img/" . $foto;
            move_uploaded_file($tmp, $path);
            $query = "UPDATE alat_berat SET nama_alat='$nama_alat', jenis='$jenis', harga_per_hari='$harga_per_hari', status='$status', foto='$foto' WHERE id='$id'";
        } else {
            $query = "UPDATE alat_berat SET nama_alat='$nama_alat', jenis='$jenis', harga_per_hari='$harga_per_hari', status='$status' WHERE id='$id'";
        }

        mysqli_query($conn, $query);
        header("Location: alat_berat.php");
        exit;
    }
    $result = mysqli_query($conn, "SELECT * FROM alat_berat WHERE id='$id'");
    $data_edit = mysqli_fetch_assoc($result);
}

// PROSES HAPUS
if ($action == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM alat_berat WHERE id='$id'");
    header("Location: alat_berat.php");
    exit;
}

// AMBIL DATA ALAT BERAT
$data = mysqli_query($conn, "SELECT * FROM alat_berat ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Alat Berat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "sidebar_admin.php"; ?>
    <div class="container mt-4">
        <h3>Data Alat Berat</h3>

        <!-- Form tambah/edit -->
        <?php if ($action == 'add' || ($action == 'edit' && isset($data_edit))): ?>
            <h5><?= $action == 'add' ? 'Tambah Alat Berat' : 'Edit Alat Berat' ?></h5>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Nama Alat</label>
                    <input type="text" name="nama_alat" class="form-control" required
                        value="<?= $action == 'edit' ? $data_edit['nama_alat'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Jenis</label>
                    <input type="text" name="jenis" class="form-control" required
                        value="<?= $action == 'edit' ? $data_edit['jenis'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Harga Sewa (per hari)</label>
                    <input type="number" name="harga_per_hari" class="form-control" required
                        value="<?= $action == 'edit' ? $data_edit['harga_per_hari'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Foto Alat</label>
                    <input type="file" name="foto" class="form-control" <?= $action == 'add' ? 'required' : '' ?>>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select" required>
                        <option value="tersedia" <?= ($action == 'edit' && $data_edit['status'] == 'tersedia') ? 'selected' : '' ?>>Tersedia</option>
                        <option value="disewa" <?= ($action == 'edit' && $data_edit['status'] == 'disewa') ? 'selected' : '' ?>>
                            Disewa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><?= $action == 'add' ? 'Tambah' : 'Update' ?></button>
                <a href="alat_berat.php" class="btn btn-secondary">Batal</a>
            </form>

            <!-- Tabel data -->
        <?php else: ?>
            <a href="alat_berat.php?action=add" class="btn btn-success mb-3">Tambah Alat Berat</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Alat</th>
                        <th>Jenis</th>
                        <th>Harga Sewa (per hari)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($data) > 0): ?>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($data)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?php if ($row['foto']): ?>
                                        <img src="../assets/img/<?= htmlspecialchars($row['foto']) ?>" alt="Foto Alat" width="80">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                <td><?= htmlspecialchars($row['jenis']) ?></td>
                                <td>Rp <?= number_format($row['harga_per_hari'], 0, ',', '.') ?></td>
                                <td><span
                                        class="badge bg-<?= $row['status'] == 'tersedia' ? 'success' : 'danger' ?>"><?= ucfirst($row['status']) ?></span>
                                </td>
                                <td>
                                    <a href="alat_berat.php?action=edit&id=<?= $row['id'] ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="alat_berat.php?action=delete&id=<?= $row['id'] ?>"
                                        onclick="return confirm('Hapus alat ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data alat berat.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>