<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Login</title>
  <style>
    body {
      min-height: 100vh;

      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .card {
      border: none;
      border-radius: 1rem;
      background: #fff;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.8s ease;
    }

    .card-header {
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      background: linear-gradient(135deg, #2575fc, #6a11cb);
    }

    .input-group-text {
      background: #f7f7f7;
      border: none;
      color: #6a11cb;
    }

    .form-control {
      border: none;
      background: #f7f7f7;
    }

    .form-control:focus {
      background: #eef2ff;
      box-shadow: none;
      border-color: #6a11cb;
    }

    .btn-primary {
      background: linear-gradient(135deg, #2575fc, #6a11cb);
      border: none;
      padding: 0.7rem;
      font-weight: bold;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      opacity: 0.9;
      transform: scale(1.02);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    a {
      color: #2575fc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php include "partials/navbar.php"; ?>

  <!-- Alert -->


  <div class="col-md-6 col-lg-4">
    <div class="card shadow-sm">

      <div class="card-header text-white d-flex align-items-center">
        <i class="bi bi-box-arrow-in-right me-2"></i>
        <h4 class="mb-0">Login</h4>
      </div>

      <div class="card-body p-4">
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Login gagal! Periksa email dan password Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        <form method="post" action="controller/proses_login.php">
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="mb-4 input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </button>
        </form>
      </div>
      <div class="card-footer text-center bg-light">
        <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>