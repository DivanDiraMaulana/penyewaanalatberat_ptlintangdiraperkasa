<?php
include '../config/db.php';
// session_start();
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
if (mysqli_query($conn, $query)) {
  header("Location: ../index.php");
  echo "Registrasi berhasil. <a href='../login.php'>Login</a>";
} else {
  echo "Error: " . mysqli_error($conn);
}
