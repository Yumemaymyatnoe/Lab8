<?php
session_start();
include 'setting.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    $_SESSION['username'] = $username;
    header("Location: profile.php");
    exit();
  } else {
    echo "Invalid login. <a href='login.php'>Try again</a>";
  }
}
?>