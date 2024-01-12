<?php
session_start();
include 'core/db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  echo '<script>window.location.href="views/login.php";</script>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fury</title>
  <style>
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    section {
      position: relative;
      overflow: hidden;
      height: 100vh;
      width: 100%;
    }

    .home {
      z-index: -5;
      background: #000;
      background-image: url(asset/home1.png);
      background-size: cover;
    }

    .waves {
      position: absolute;
      width: 100%;
      height: 30vh;
      padding: 0;
      margin: 0;
      bottom: 0;
    }

    .wave1 {
      width: 100%;
      position: absolute;
      bottom: -80%;
      z-index: -1;
    }

    .wave2 {
      width: 100%;
      position: absolute;
      bottom: -45%;
      z-index: -2;
    }

    .wave3 {
      width: 100%;
      position: absolute;
      bottom: -55%;
      z-index: -3;
    }
  </style>
</head>

<body>
  <a href="controller/controller.php?logout">ceritanya tombol logout</a>
  <section class="home">
    <div class="waves">
      <svg class="wave1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1"
          d="M0,128L80,133.3C160,139,320,149,480,138.7C640,128,800,96,960,85.3C1120,75,1280,85,1360,90.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
      </svg>
      <svg class="wave2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#5000ca" fill-opacity="1"
          d="M0,64L80,90.7C160,117,320,171,480,181.3C640,192,800,160,960,138.7C1120,117,1280,107,1360,101.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
      </svg>
      <svg class="wave3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#000b76" fill-opacity="1"
          d="M0,32L80,48C160,64,320,96,480,90.7C640,85,800,43,960,32C1120,21,1280,43,1360,53.3L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
      </svg>
    </div>
  </section>

  <section class="dashboard">
  </section>

  <script src="script/jquery-3.7.1.min.js"></script>
  <script src="script/jquery.easing.1.3.js"></script>
  <script src="script/script.js"></script>
</body>

</html>