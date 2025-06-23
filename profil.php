<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}
include 'config/db.php';

$id_user = $_SESSION['user_id'];
// Ambil data user
$stmt = $conn->prepare('SELECT nama, email FROM users WHERE id = ?');
$stmt->bind_param('i', $id_user);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama']);
  $email = trim($_POST['email']);
  $update = $conn->prepare('UPDATE users SET nama = ?, email = ? WHERE id = ?');
  $update->bind_param('ssi', $nama, $email, $id_user);
  if ($update->execute()) {
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    header('Location: profil.php'); // reload ke profile biasa
    exit;
  } else {
    $error = "Gagal update profil: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
  <?php include 'partials/sidebar.php'; ?>
  <div class="content d-flex align-items-center justify-content-center" style="min-height:100vh; background:#f8f9fa;">
    <div class="card p-4 text-center" style="width:22rem;">
      <img src="assets/img/profile_user.png" class="card-img-top mb-3" style="height: 280px; object-fit: cover;" alt="Foto Profil">
      <div class="card-body">

        <?php if (isset($_GET['edit'])): ?>
          <h4 class="mb-3"><i class="bi bi-pencil-square text-primary"></i> Edit Profil</h4>
          <?php if (isset($error)) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
          <form method="post">
            <div class="mb-3 text-start">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($user['nama']); ?>" required>
            </div>
            <div class="mb-3 text-start">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm w-100">Simpan</button>
            <a href="profile.php" class="btn btn-secondary btn-sm w-100 mt-2">Batal</a>
          </form>
        <?php else: ?>
          <h4 class="card-title mb-3"><i class="bi bi-person-fill text-primary"></i> <?= htmlspecialchars($user['nama']); ?></h4>
          <p class="card-text mb-3"><i class="bi bi-envelope-fill text-secondary"></i> <?= htmlspecialchars($user['email']); ?></p>
          <a href="?edit=1" class="btn btn-primary btn-sm mt-2"><i class="bi bi-pencil-square"></i> Edit Profil</a>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>