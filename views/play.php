<title>Fury</title>
<link rel="icon" href="../asset/logo.png" type="image/png" />

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: black;
        width: 100vw;
        height: 100vh;
        position: relative;
        overflow: hidden;
    }

    canvas {
        width: 100vw;
        height: 100vh;
    }

    .form-score {
        margin-bottom: 1rem;
    }

    .score {
        position: absolute;
        text-align: center;
        color: white;
        margin: 1%;
        user-select: none;
    }

    span {
        color: aqua;
    }

    .container {
        display: flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        inset: 0;
    }

    .wrapper {
        background-color: white;
        width: 50%;
        padding: 2rem;
        text-align: center;
        border-radius: 15px;
    }

    .wrapper h1 {
        font-size: 4rem;
        font-weight: bold;
        color: blue;
    }

    .wrapper p {
        font-size: 1.5rem;
        color: gray;
        padding: 0.5rem 0;
    }

    .wrapper button {
        color: white;
        font-size: 2rem;
        font-weight: bold;
        padding: 1rem;
        width: 100%;
        background-color: blue;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.2s all;
    }

    .wrapper button:hover {
        background-color: cyan;
        margin-top: -5px;
    }

    #saveBtn {
        display: none;
    }
</style>

<body>

    <div class="score">
        SCORE : <span id="scoreEL">0</span>
    </div>

    <div class="container" id="popUp">
        <div class="wrapper">
            <form action="../controller/controller.php" method="post" class="form-score">
                <input type="hidden" class="myScore" name="score">
                <h1 id="scoreEL2">0</h1>
                <p>Points</p>
                <button id="saveBtn" name="save" type="submit">Save</button>
            </form>
            <button id="startBtn">Start Game</button>
        </div>
    </div>

    <canvas></canvas>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
    integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
session_start();
include 'core/db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo '<script>window.location.href="views/login.php";</script>';
    exit;
}

if (isset($_SESSION['mode'])) {
    $mode = $_SESSION['mode'];
    echo '<script> console.log("aaaaaaa")</script>';
    if ($mode === 'easy') {
        echo '<script> let enemiesSpeed = 1; </script>';
    } elseif ($mode === 'medium') {
        echo '<script> let enemiesSpeed = 3; </script>';
    } elseif ($mode === 'hard') {
        echo '<script> let enemiesSpeed = 5; </script>';
    }
}
?>

<script src="../script/pla.js"></script>