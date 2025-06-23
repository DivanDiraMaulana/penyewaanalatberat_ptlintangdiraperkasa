<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Alat Berat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .content {
      margin-left: 250px;
      /* Menyesuaikan lebar sidebar */
      padding: 20px;
      background-color: #f8f9fa;
      min-height: 100vh;
    }
  </style>
</head>

<body>

  <?php include 'partials/sidebar.php'; ?>

  <div class="content">
    <div class="container mt-4">
      <h2 class="mb-4">Daftar Alat Berat</h2>
      <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM alat_berat");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <img src="assets/img/<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama_alat']); ?>" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['nama_alat']); ?></h5>
                <p class="card-text"><strong>Jenis:</strong> <?php echo htmlspecialchars($row['jenis']); ?></p>
                <p class="card-text"><strong>Harga/hari:</strong> Rp<?php echo number_format($row['harga_per_hari'], 0, ',', '.'); ?></p>
                <p class="card-text"><strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?></p>
                <?php if ($row['status'] == 'tersedia') { ?>
                  <a href="form_sewa.php?id=<?php echo $row['id']; ?>" class="btn btn-success w-100">Sewa Sekarang</a>
                <?php } else { ?>
                  <button class="btn btn-danger w-100" disabled>Tidak Tersedia</button>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>