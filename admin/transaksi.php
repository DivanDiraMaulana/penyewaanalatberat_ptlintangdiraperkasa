<?php
session_start();
include "../config/db.php";

// Cek login admin (ubah sesuai kebutuhan)
if (!isset($_SESSION['is_login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$action = $_GET['action'] ?? '';

if ($action == 'add') {

    // proses tambah data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_alat = $_POST['id_alat'];
        $id_user = $_POST['id_user'];
        $tanggal_sewa = $_POST['tanggal_sewa'];
        $durasi = $_POST['durasi'];
        $total_biaya = $_POST['total_biaya'];
        $status = $_POST['status'];

        $query = "INSERT INTO transaksi (id_alat, id_user, tanggal_sewa, durasi, total_biaya, status)
                  VALUES ('$id_alat', '$id_user', '$tanggal_sewa', '$durasi', '$total_biaya', '$status')";
        mysqli_query($conn, $query);

        //mengubah status alat menjadi disewa
        $sqlab = "UPDATE alat_berat SET status='disewa' WHERE id='$id_alat'";
        mysqli_query($conn, $sqlab);
        header("Location: transaksi.php");
        exit;
    }
    // tampilkan form tambah di bawah (HTML form)
} elseif ($action == 'edit' && isset($_GET['id'])) {
    // proses edit data
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_alat = $_POST['id_alat'];
        $id_user = $_POST['id_user'];
        $tanggal_sewa = $_POST['tanggal_sewa'];
        $durasi = $_POST['durasi'];
        $total_biaya = $_POST['total_biaya'];
        $status = $_POST['status'];

        $query = "UPDATE transaksi SET id_alat='$id_alat', id_user='$id_user', tanggal_sewa='$tanggal_sewa',
                  durasi='$durasi', total_biaya='$total_biaya', status='$status' WHERE id='$id'";
        mysqli_query($conn, $query);
        header("Location: transaksi.php");
        exit;
    }
    // ambil data transaksi untuk form edit
    $result = mysqli_query($conn, "SELECT * FROM transaksi WHERE id='$id'");
    $data_edit = mysqli_fetch_assoc($result);
} elseif ($action == 'delete' && isset($_GET['id'])) {
    // proses hapus data
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM transaksi WHERE id='$id'");
    header("Location: transaksi.php");
    exit;
} elseif ($action == 'selesai' && isset($_GET['id'])) {
    // proses ubah status menjadi selesai
    $id = $_GET['id'];

    // Ambil id_alat berdasarkan id transaksi
    $query = "SELECT id_alat FROM transaksi WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $transaksi = mysqli_fetch_assoc($result);

    if ($transaksi) {
        $id_alat = $transaksi['id_alat'];

        // Update status transaksi menjadi selesai
        mysqli_query($conn, "UPDATE transaksi SET status='selesai' WHERE id='$id'");

        // Update status alat berat menjadi tersedia
        mysqli_query($conn, "UPDATE alat_berat SET status='tersedia' WHERE id='$id_alat'");
    }

    header("Location: transaksi.php");
    exit;
}


// Ambil semua data transaksi untuk ditampilkan di tabel
$query = "SELECT t.*, a.nama_alat, u.nama AS nama_user 
          FROM transaksi t 
          JOIN alat_berat a ON t.id_alat = a.id 
          JOIN users u ON t.id_user = u.id AND t.status != 'selesai'
          ORDER BY t.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include "sidebar_admin.php";
    $alat_result = mysqli_query($conn, "SELECT id, nama_alat,harga_per_hari, status FROM alat_berat");

    // Ambil semua data user
    $user_result = mysqli_query($conn, "SELECT id, nama FROM users WHERE role = 'user'");
    ?>
    <div class="container mt-4">
        <h3>Data Transaksi</h3>
        <?php if ($action == 'add' || ($action == 'edit' && isset($data_edit))): ?>
            <h5><?= $action == 'add' ? 'Tambah Transaksi' : 'Edit Transaksi' ?></h5>
            <form method="POST" action="">
                <div class="mb-3">
                    <label>Nama Alat Berat</label>
                    <select name="id_alat" id="id_alat" class="form-select" required>
                        <option value="">-- Pilih Alat Berat --</option>
                        <?php while ($alat = mysqli_fetch_assoc($alat_result)): ?>
                            <option value="<?= $alat['id'] ?>" data-harga="<?= $alat['harga_per_hari'] ?>"
                                <?= ($action == 'edit' && $data_edit['id_alat'] == $alat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($alat['nama_alat']) ?> - <?= $alat['status'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama User</label>
                    <select name="id_user" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        <?php while ($user = mysqli_fetch_assoc($user_result)): ?>
                            <option value="<?= $user['id'] ?>" <?= ($action == 'edit' && $data_edit['id_user'] == $user['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($user['nama']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" class="form-control" required
                        value="<?= $action == 'edit' ? $data_edit['tanggal_sewa'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Durasi (hari)</label>
                    <input type="number" name="durasi" id="durasi" class="form-control" required
                        value="<?= $action == 'edit' ? $data_edit['durasi'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Total Biaya</label>
                    <input type="number" name="total_biaya" id="total_biaya" class="form-control" readonly
                        value="<?= $action == 'edit' ? $data_edit['total_biaya'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select" required>
                        <option value="menunggu" <?= ($action == 'edit' && $data_edit['status'] == 'menunggu') ? 'selected' : '' ?>>Menunggu</option>
                        <option value="disetujui" <?= ($action == 'edit' && $data_edit['status'] == 'disetujui') ? 'selected' : '' ?>>Disetujui</option>
                        <option value="berjalan" <?= ($action == 'edit' && $data_edit['status'] == 'berjalan') ? 'selected' : '' ?>>Berjalan</option>
                        <option value="selesai" <?= ($action == 'edit' && $data_edit['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                        <option value="ditolak" <?= ($action == 'edit' && $data_edit['status'] == 'ditolak') ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><?= $action == 'add' ? 'Tambah' : 'Update' ?></button>
                <a href="transaksi.php" class="btn btn-secondary">Batal</a>
            </form>
        <?php else: ?>
            <a href="transaksi.php?action=add" class="btn btn-success mb-3">Tambah Transaksi</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyewa</th>
                        <th>Alat Berat</th>
                        <th>Tgl Sewa</th>
                        <th>Durasi (hari)</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_user']) ?></td>
                                <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_sewa'])) ?></td>
                                <td><?= $row['durasi'] ?></td>
                                <td>Rp<?= number_format($row['total_biaya'], 0, ',', '.') ?></td>
                                <td>
                                    <?php
                                    $status = $row['status'];
                                    $badge = 'secondary'; // default

                                    if ($status == 'menunggu') {
                                        $badge = 'warning';
                                    } elseif ($status == 'disetujui') {
                                        $badge = 'info';
                                    } elseif ($status == 'berjalan') {
                                        $badge = 'primary';
                                    } elseif ($status == 'selesai') {
                                        $badge = 'success';
                                    } elseif ($status == 'ditolak') {
                                        $badge = 'danger';
                                    }
                                    ?>
                                    <span class="badge bg-<?= $badge ?>"><?= ucfirst($status) ?></span>
                                </td>
                                <td>
                                    <a href="transaksi.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="transaksi.php?action=delete&id=<?= $row['id'] ?>"
                                        onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
                                    <!-- Tambahkan tombol selesai -->
                                    <a href="transaksi.php?action=selesai&id=<?= $row['id'] ?>"
                                        onclick="return confirm('Tandai transaksi ini sebagai selesai?')"
                                        class="btn btn-success btn-sm" title="Selesaikan">
                                        <i class="bi bi-check-circle"></i> <!-- pastikan Anda menggunakan Bootstrap Icons -->
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const selectAlat = document.getElementById('id_alat');
        const durasiInput = document.getElementById('durasi');
        const totalBiayaInput = document.getElementById('total_biaya');

        function hitungTotal() {
            const harga = selectAlat.selectedOptions[0]?.getAttribute('data-harga') || 0;
            const durasi = durasiInput.value || 0;
            const total = parseInt(harga) * parseInt(durasi);
            totalBiayaInput.value = total;
        }

        selectAlat.addEventListener('change', hitungTotal);
        durasiInput.addEventListener('input', hitungTotal);

        // Jika mau langsung dihitung saat halaman edit dimuat:
        hitungTotal();
    </script>
</body>

</html>