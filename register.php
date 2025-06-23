<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Register</title>
  <style>
    body {
      background-color: #fff;
      padding: 2rem 1rem;
    }

    .card {
      border: none;
      border-radius: 1rem;
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
    }

    .card-header {
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .btn-success {
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: #198754;
    }
  </style>
</head>

<body>
  <?php include "partials/navbar.php"; ?>

  <div class="container my-5">
    <div class="card mx-auto shadow-lg" style="max-width: 500px;">
      <div class="card-header bg-primary text-white text-center py-3">
        <h4 class="mb-0"><i class="bi bi-person-plus me-2"></i>Registrasi Akun</h4>
      </div>
      <div class="card-body p-4">
        <form method="post" action="controller/proses_register.php">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap Anda" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="contoh@domain.com" required>
            </div>
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
            </div>
          </div>
          <button type="submit" class="btn btn-success w-100 py-2">
            <i class="bi bi-check-circle me-1"></i> Daftar
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>