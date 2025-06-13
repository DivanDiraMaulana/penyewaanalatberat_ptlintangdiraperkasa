<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Register</title>
</head>
<body>
  <div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
      <div class="card-header bg-primary text-white text-center">
        <h4><i class="bi bi-person-plus"></i> Registrasi Akun</h4>
      </div>
      <div class="card-body">
        <form method="post" action="proses_register.php">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <button type="submit" class="btn btn-success w-100"><i class="bi bi-check-circle"></i> Daftar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>