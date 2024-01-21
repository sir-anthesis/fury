<?php
session_start();
include '../core/db.php'; // Include your database connection

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  echo '<script>window.location.href="../index.php";</script>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fury</title>
  <link rel="icon" href="../asset/logo.png" type="image/png" />
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="stylesheet" href="../css/resLoginn.css" />
</head>

<body>
  <section class="home">
    <div class="logo">
      <a href="">
        <img src="../asset/logo.png" alt="" />
        <h1>Fury</h1>
      </a>
    </div>
    <img class="bg" src="../asset/earth.gif" alt="" />
    <div class="login">
      <div class="title">
        <a href="#" class="loginLink title-actived">
          <h1>Login</h1>
        </a>
        <h2>|</h2>
        <a href="#" class="signUpLink">
          <h1>Sign Up</h1>
        </a>
      </div>
      <div class="login-form">
        <form action="../controller/controller.php" method="POST">
          <div class="input-wrapper">
            <label for="username" class="input-label">Username:</label>
            <input type="text" id="username" name="username" class="custom-input" placeholder="Enter your username"
              required />
          </div>

          <div class="input-wrapper">
            <label for="password" class="input-label">Password:</label>
            <input type="password" id="password" name="password" class="custom-input" placeholder="Enter your password"
              required />
          </div>

          <button type="submit" name="login">Login</button>
        </form>
      </div>

      <div class="sign-up">
        <div class="title dis-active">
          <a href="#" class="loginLink title-actived">
            <h1>Login</h1>
          </a>
          <h2>|</h2>
          <a href="#" class="signUpLink">
            <h1>Sign Up</h1>
          </a>
        </div>
        <div class="login-form dis-active">
          <form action="../controller/controller.php" method="POST">
            <div class="input-wrapper">
              <label for="username" class="input-label">Email:</label>
              <input type="email" id="email" name="email" class="custom-input" placeholder="Enter your username"
                required />
            </div>

            <div class="input-wrapper">
              <label for="username" class="input-label">Username:</label>
              <input type="text" id="username" name="username" class="custom-input" placeholder="Enter your username"
                required />
            </div>

            <div class="input-wrapper">
              <label for="password" class="input-label">Password:</label>
              <input type="password" id="password" name="password" class="custom-input"
                placeholder="Enter your password" required />
            </div>
            <button type="submit" name="signup">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="../script/jquery-3.7.1.min.js"></script>
  <script src="../script/jquery.easing.1.3.js"></script>
  <script src="../script/login.js"></script>
</body>

</html>