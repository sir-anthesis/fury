<?php
require_once '../core/db.php';
class models
{
    private $conn; // Declare a private property to store the connection

    public function __construct($conn)
    {
        // Initialize the connection passed as a parameter
        $this->conn = $conn;
    }

    public function signUp()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $this->conn->prepare("INSERT INTO tb_user (email, username, password) VALUES (?,?,?)");
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

        // Fetch the user using fetch() instead of fetch_assoc()
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Compare plain text passwords directly (not recommended for security)
            if ($password === $user['password']) {
                $_SESSION['logged_in'] = true;
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
}
