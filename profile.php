<?php
session_start();
include 'setting.php';

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
$query = "SELECT email FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head><title>Profile</title></head>
<body>
  <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>

  <h3>Edit Profile</h3>
  <form method="post" action="update_profile.php">
    <label>New Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
    <input type="submit" value="Update">
  </form>
</body>
</html>
