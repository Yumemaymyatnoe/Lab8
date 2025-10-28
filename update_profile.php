<?php
session_start();
include 'setting.php';

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$newEmail = $_POST['email'];
$username = $_SESSION['username'];

$query = "UPDATE user SET email='$newEmail' WHERE username='$username'";
mysqli_query($conn, $query);

header("Location: profile.php");
exit();
?>