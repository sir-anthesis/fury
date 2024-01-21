<?php
session_start();
require_once '../core/db.php';
class models
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function signUp()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $this->conn->prepare("INSERT INTO tb_game (email, username, password) VALUES (?,?,?)");
        $stmt->execute([$email, $username, $password]);

        echo '<script>alert("Signup successful!");';
        echo 'window.location.href="../views/login.php";</script>';
        exit;
    }

    public function login()
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $this->conn->prepare("SELECT * FROM tb_user WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($password === $user['password']) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['profile_picture'] = $user['profile_picture'];
                header("Location: ../");
                exit;
            } else {
                echo '<script>alert("Your password is incorect");';
                echo 'window.location.href="../views/login.php";</script>';
            }
        } else {
            echo '<script>alert("Your username is incorrect");';
            echo 'window.location.href="../views/login.php";</script>';
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: ../views/login.php");
        exit;
    }
    public function play()
    {
        session_start();

        if (isset($_GET['easy'])) {
            $_SESSION['mode'] = 'easy';
        } elseif (isset($_GET['medium'])) {
            $_SESSION['mode'] = 'medium';
        } elseif (isset($_GET['hard'])) {
            $_SESSION['mode'] = 'hard';
        }

        header("Location: ../views/play.php");
    }

    public function savingScore()
    {
        $user_id = $_SESSION['user_id'];
        $mode = $_SESSION['mode'];
        $score = $_POST['score'];

        if ($mode == "easy") {
            $stmt = $this->conn->prepare("INSERT INTO tb_easy (user_id, score) VALUES (?,?)");
        } elseif ($mode == "medium") {
            $stmt = $this->conn->prepare("INSERT INTO tb_medium (user_id, score) VALUES (?,?)");
        } elseif ($mode == "hard") {
            $stmt = $this->conn->prepare("INSERT INTO tb_hard (user_id, score) VALUES (?,?)");
        }

        $stmt->execute([$user_id, $score]);

        echo '<script>alert("Saving successful!");';
        echo 'window.location.href="../";</script>';
        exit;
    }

    public function leaderboard($mode)
    {
        $stmt = $this->conn->prepare("SELECT * FROM vw_leaderboard WHERE mode = ?");
        $stmt->execute([$mode]);

        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function updateProfile($id)
    {
        $email = $_POST['email'];
        $username = $_POST['name'];
        $password = $_POST['password'];

        if ($_FILES['pp']['name']) {
            $profile_picture = 'asset/profile/' . $_FILES['pp']['name'];
        } else {
            $old_picture = $_SESSION['profile_picture'];
            $profile_picture = $old_picture;
        }

        $stmt = $this->conn->prepare("UPDATE tb_user SET email=?, username=?, password=?, profile_picture=? WHERE user_id = ?");
        $stmt->execute([$email, $username, $password, $profile_picture, $id]);

        echo '<script>alert("Updating successful!")</script>;';

        $refresh = $this->conn->prepare("SELECT * FROM tb_user WHERE user_id = ?");
        $refresh->execute([$id]);

        $user = $refresh->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['profile_picture'] = $user['profile_picture'];

        echo '<script>window.location.href="../";</script>';
    }


}
