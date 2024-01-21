<?php
session_start();
include 'core/db.php';
$conn = getConnection();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  echo '<script>window.location.href="views/login.php";</script>';
  exit;
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$user_id = $_SESSION['user_id'];
$pp = $_SESSION['profile_picture'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="asset/logo.png" type="image/png" />
  <title>Fury</title>
  <link rel="stylesheet" href="css/indexx.css" />
  <link rel="stylesheet" href="css/resIndexx.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <section class="home">
    <nav>
      <div class="logo">
        <a href="#">
          <img src="asset/logo2.png" alt="" />
          <h1>Fury</h1>
        </a>
      </div>
      <div class="profile">
        <p>Hai
          <?= $username ?>
        </p>
        <a href="#" onclick="toggleProfileContainer()">
          <div id="pp">
            <img src="<?= $pp ?>" alt="">
          </div>
        </a>
      </div>
      <div class="profile-container">
        <a href="#" onclick="closeProfileContainer()">
          <i class="bi bi-x-lg"></i>
        </a>
        <div class="profile-content">
          <div class="profile-photo">
            <img src="<?= $pp ?>" alt="" />
          </div>
          <form action="">
            <div class="profile-data">
              <div class="data">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-input" name="name" value="<?= $username ?>" readonly />
              </div>
              <div class="data">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-input" name="email" value="<?= $email ?>" readonly />
              </div>
              <div class="data">
                <label for="name" class="form-label">Password</label>
                <input type="text" class="form-input" name="password" value="<?= $password ?>" readonly />
              </div>
              <div class="data pp-input">
                <label for="name" class="form-label">Profile Picture</label>
                <input type="file" class="form-input" name="pp" readonly />
              </div>
              <div class="profile-buttons">
                <i class="profile-button cancel-button" onclick="cancelEdit()">
                  Cancel
                </i>
                <i class="profile-button edit-button" onclick="toggleEdit()">
                  Edit
                </i>
              </div>
            </div>
          </form>

          <div class="logout">
            <a href="controller/controller.php?logout" id="logout-btn">Logout</a>
          </div>

        </div>
      </div>
    </nav>
    <div class="home-content">
      <div class="left">
        <div class="mode-img-home">
          <img src="asset/ship.gif" alt="" class="img-home" />
        </div>

        <div class="button-container">
          <div class="arrow-left bi bi-caret-left-fill" onclick="changeDifficulty('left')"></div>
          <button class="home-button" onclick="redirectToPlay(this)">
            medium
          </button>
          <div class="arrow-right bi bi-caret-right-fill" onclick="changeDifficulty('right')"></div>
        </div>

        <div class="text-mode">
          <p>Click to Start!</p>
        </div>
      </div>
      <div class="right">

        <div class="leaderboard l-easy">
          <div class="title-leaderboard">
            <h2>Leaderboard</h2>
            <div class="leaderboard-mode">
              <p>EASY</p>
            </div>
          </div>
          <?php
          $easyQuery = "SELECT * FROM vw_leaderboard where mode = 'easy' ORDER BY score DESC";
          $results = $conn->query($easyQuery);
          $datas = $results->fetchAll();
          $i = 1;
          ?>
          <div class="list-leaderboard">
            <ul>
              <?php foreach ($datas as $data) { ?>
                <li>
                  <div class="prof">
                    <div class="index">
                      <?= $i++ ?>
                    </div>
                    <div id="pp"><img src="<?= $data['profile_picture'] ?>" alt=""></div>
                    <?= $data['username'] ?>
                  </div>
                  <div class="score">
                    <h2>
                      <?= $data['score'] ?>
                    </h2>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="leaderboard l-medium">
          <div class="title-leaderboard">
            <h2>Leaderboard</h2>
            <div class="leaderboard-mode">
              <p>MEDIUM</p>
            </div>
          </div>
          <?php
          $easyQuery = "SELECT * FROM vw_leaderboard where mode = 'medium' ORDER BY score DESC";
          $results = $conn->query($easyQuery);
          $datas = $results->fetchAll();
          $i = 1;
          ?>
          <div class="list-leaderboard">
            <ul>
              <?php foreach ($datas as $data) { ?>
                <li>
                  <div class="prof">
                    <div class="index">
                      <?= $i++ ?>
                    </div>
                    <div id="pp"><img src="<?= $data['profile_picture'] ?>" alt=""></div>
                    <?= $data['username'] ?>
                  </div>
                  <div class="score">
                    <h2>
                      <?= $data['score'] ?>
                    </h2>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="leaderboard l-hard">
          <div class="title-leaderboard">
            <h2>Leaderboard</h2>
            <div class="leaderboard-mode">
              <p>HARD</p>
            </div>
          </div>
          <?php
          $easyQuery = "SELECT * FROM vw_leaderboard where mode = 'hard' ORDER BY score DESC";
          $results = $conn->query($easyQuery);
          $datas = $results->fetchAll();
          $i = 1;
          ?>
          <div class="list-leaderboard">
            <ul>
              <?php foreach ($datas as $data) { ?>
                <li>
                  <div class="prof">
                    <div class="index">
                      <?= $i++ ?>
                    </div>
                    <div id="pp"><img src="<?= $data['profile_picture'] ?>" alt=""></div>
                    <?= $data['username'] ?>
                  </div>
                  <div class="score">
                    <h2>
                      <?= $data['score'] ?>
                    </h2>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
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

  <footer>
    <p>h</p>
  </footer>

  <script src="script/jquery-3.7.1.min.js"></script>
  <script src="script/jquery.easing.1.3.js"></script>
  <script src="script/indexx.js"></script>
</body>

</html>