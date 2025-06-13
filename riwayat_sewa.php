<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Riwayat Sewa</title>
</head>
<body>
  <?php include 'partials/navbar.php'; ?>
  <div class="container mt-5">
    <h2>Riwayat Penyewaan</h2>
    <table class="table table-striped mt-3">
      <thead>
        <tr><th>#</th><th>Nama Alat</th><th>Tanggal</th><th>Durasi</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?php $no=1; while($row=mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['nama_alat']; ?></td>
          <td><?php echo $row['tanggal_sewa']; ?></td>
          <td><?php echo $row['durasi']; ?> hari</td>
          <td>Rp<?php echo number_format($row['total_biaya'],0,',','.'); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
