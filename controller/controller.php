<?php
require_once '../models/models.php';
require_once '../core/db.php';
$conn = getConnection();
$model = new models($conn);

if (isset($_POST['signup'])) {
    $model->signUp();
}

if (isset($_POST['login'])) {
    $model->login();
}

if (isset($_GET['logout'])) {
    $model->logout();
}

if (isset($_GET['play'])) {
    $model->play();
}

if (isset($_POST['save'])) {
    $model->savingScore();
}

if (isset($_POST['update'])) {
    $model->updateProfile($_SESSION['user_id']);
}


