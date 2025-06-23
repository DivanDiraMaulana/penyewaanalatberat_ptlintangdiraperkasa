<?php 
session_start();
include "../config/db.php";

// Cek login admin
if (!isset($_SESSION['is_login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}



$action = $_GET['action'] ?? '';

if ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $query = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')";
        mysqli_query($conn, $query);
        header("Location: data_user.php");
        exit;
    }
} elseif ($action == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "UPDATE users SET nama='$nama', email='$email', password='$password', role='$role' WHERE id='$id'";
        } else {
            $query = "UPDATE users SET nama='$nama', email='$email', role='$role' WHERE id='$id'";
        }
        mysqli_query($conn, $query);
        header("Location: data_user.php");
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    $data_edit = mysqli_fetch_assoc($result);
} elseif ($action == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    header("Location: data_user.php");
    exit;
}

// Ambil data semua user
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "sidebar_admin.php"; 
// Ambil semua data alat berat

?>
<div class="container mt-4">
    <h3>Data User</h3>
    <?php if ($action == 'add' || ($action == 'edit' && isset($data_edit))): ?>
        <h5><?= $action == 'add' ? 'Tambah User' : 'Edit User' ?></h5>
        <form method="POST" action="">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required value="<?= $action == 'edit' ? $data_edit['nama'] : '' ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="<?= $action == 'edit' ? $data_edit['email'] : '' ?>">
            </div>
            <div class="mb-3">
                <label>Password <?= $action == 'edit' ? '(Biarkan kosong jika tidak diubah)' : '' ?></label>
                <input type="password" name="password" class="form-control" <?= $action == 'add' ? 'required' : '' ?>>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="user" <?= ($action == 'edit' && $data_edit['role'] == 'user') ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= ($action == 'edit' && $data_edit['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?= $action == 'add' ? 'Tambah' : 'Update' ?></button>
            <a href="data_user.php" class="btn btn-secondary">Batal</a>
        </form>
    <?php else: ?>
        <a href="data_user.php?action=add" class="btn btn-success mb-3">Tambah User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= ucfirst($row['role']) ?></td>
                            <td>
                                <a href="data_user.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="data_user.php?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus user ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center">Belum ada data user.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
