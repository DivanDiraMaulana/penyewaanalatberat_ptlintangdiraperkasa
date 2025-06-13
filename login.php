<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Login</title>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-box-arrow-in-right me-2"></i>
            <h4 class="mb-0">Login</h4>
          </div>
          <div class="card-body">
            <form method="post" action="proses_login.php">
              <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </button>
            </form>
          </div>
          <div class="card-footer text-center">
            <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>