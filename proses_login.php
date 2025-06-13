<?php
include 'config/db.php';
// session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['nama'] = $user['nama'];
  $_SESSION['role'] = $user['role'];
  header("Location: index.php");
} else {
  echo "Login gagal. Coba lagi.";
}
?>