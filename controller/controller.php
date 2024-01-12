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


