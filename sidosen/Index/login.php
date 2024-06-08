<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <center>
    <div class="logo">
      <div class="header">
        <img src="../Image/logodosen.png" alt="Logo" class="logo" width="150" height="180">
      </div>
    </center>
    <center>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $valid_username = "Admin";
  $valid_password = "123abc";
  if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['user'] = $username;
            // Set cookie untuk menyimpan username
            $cookie_name = "user";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
            echo "<script>alert('Login berhasil!'); window.location.href = '../Admin/admin.php';</script>";
            exit();
  }else if ($username === "" || $password === "") {
      echo "<script>alert('Data Masih Kosong.');</script>";}
else {
  echo "<script>alert('Username atau password salah.'); window.location.href = 'login.php';</script>";
            exit();}
}
?>
    <h3>Login Dosen</h3> 
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> 
      <td>Username :</td> 
      <td> 
        <input type="text" name="user"> 
      </td> 
      <td>Password :</td> 
      <td> 
        <input type="password" name="pass"> 
      </td> 
    <br> 
    <div class="buttons">
      <button  class=button type="submit">Login</button>
    <br><br> 
    
    <a href="Password.php">Lupa Password ?</a>   |   <a href="register.php">Register</a> 
  </form>
  </center>
  <br>
  <div class="footer">
    <div class="footer-text"> &copy; 2024 SiDosen 2218018</div><br>
  </div>
</body>
</html>
